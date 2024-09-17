// Data wilayah, juru, dan Google Sheet
const data = [
    { wilayah: '1', nama: 'EMIL SALIM', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '629954115' },
    { wilayah: '1', nama: 'YANRIZAL', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '2143598053' },
    { wilayah: '2', nama: 'JAMALUDDIN', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '1901095434' },
    { wilayah: '2', nama: 'ALAMSYAH', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '1446253290' },
    { wilayah: '3', nama: 'KUSNANTO', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '1539767816' },
    { wilayah: '3', nama: 'ALDA IRAWAN', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '216012663' },
    { wilayah: '4', nama: 'IDRI RAPIS', id: '1Lw906Dx-uFzBZZTbYOHmVsd8xHBf_g0jpstEZe6IwKo', gid: '1558156392' }
];

const wilayahDropdown = document.getElementById('wilayahDropdown');
const juruDropdown = document.getElementById('juruDropdown');
const loadingSpinner = document.getElementById('loadingSpinner');
const rekapanTableBody = document.querySelector('#rekapanTable tbody');
const dateFilter = document.getElementById('dateFilter');
let allData = [];

// Set nilai default date menjadi hari ini (today)
const today = new Date().toISOString().split('T')[0];
dateFilter.value = today;

// Event listener untuk dropdown wilayah
wilayahDropdown.addEventListener('change', function() {
    const selectedWilayah = this.value;

    // Kosongkan dropdown nama juru
    juruDropdown.innerHTML = '<option value="">-- Pilih Nama Juru --</option>';
    juruDropdown.disabled = true;
    allData = []; // Kosongkan data sebelumnya

    if (selectedWilayah) {
        const filteredData = data.filter(item => item.wilayah === selectedWilayah);
        juruDropdown.disabled = false;

        // Isi dropdown nama juru berdasarkan wilayah yang dipilih
        filteredData.forEach(item => {
            const option = document.createElement('option');
            option.value = item.nama;
            option.textContent = item.nama;
            juruDropdown.appendChild(option);
        });

        // Refresh tabel setelah filter wilayah berubah
        refreshTable();
    }
});

// Event listener untuk dropdown juru
juruDropdown.addEventListener('change', function() {
    refreshTable();
});

// Event listener untuk filter tanggal
dateFilter.addEventListener('change', refreshTable);

// Fungsi untuk memperbarui tabel berdasarkan filter
function refreshTable() {
    const selectedNama = juruDropdown.value;
    const selectedDate = dateFilter.value;

    // Cari data juru yang dipilih
    const selectedData = data.filter(item => item.wilayah === wilayahDropdown.value);

    // Tampilkan spinner loading saat data dimuat
    loadingSpinner.style.display = 'block';
    rekapanTableBody.innerHTML = ''; // Kosongkan tabel

    if (selectedData.length > 0) {
        // Sort data by name alphabetically
        const sortedNames = selectedData.map(item => item.nama).sort();

        // Fetch data Google Sheet dari setiap juru di wilayah yang dipilih
        Promise.all(selectedData.map(juru =>
            fetch(`https://docs.google.com/spreadsheets/d/${juru.id}/pub?gid=${juru.gid}&single=true&output=csv`)
                .then(response => response.text())
                .then(csvText => {
                    const rows = csvText.split('\n').slice(1).map(row => row.split(',').map(cell => cell.trim()));
                    return { name: juru.nama, rows };
                })
        )).then(results => {
            const reportData = {};
            results.forEach(result => {
                reportData[result.name] = { O: "-", P0: "-", P100: "-", Sakit: "-", Izin: "-" };

                result.rows.forEach(row => {
                    const timestamp = new Date(row[0]);
                    const rowDate = timestamp.toISOString().split('T')[0];
                    if (rowDate === selectedDate) {
                        const status = row[8] || "-";
                        if (status === "O") reportData[result.name].O = reportData[result.name].O === "-" ? 1 : reportData[result.name].O + 1;
                        else if (status === "P0") reportData[result.name].P0 = reportData[result.name].P0 === "-" ? 1 : reportData[result.name].P0 + 1;
                        else if (status === "P100") reportData[result.name].P100 = reportData[result.name].P100 === "-" ? 1 : reportData[result.name].P100 + 1;
                        else if (status === "Sakit") reportData[result.name].Sakit = reportData[result.name].Sakit === "-" ? 1 : reportData[result.name].Sakit + 1;
                        else if (status === "Izin") reportData[result.name].Izin = reportData[result.name].Izin === "-" ? 1 : reportData[result.name].Izin + 1;
                    }
                });
            });

            // Display all names sorted and ensure they appear in the table even without data
            sortedNames.forEach(name => {
                const row = reportData[name] || { O: "-", P0: "-", P100: "-", Sakit: "-", Izin: "-" };
                const tr = document.createElement('tr');
                if (row.O === "-") {
                    tr.classList.add('highlight-red');
                }
                tr.innerHTML = `
                    <td>${name}</td>
                    <td>${row.O}</td>
                    <td>${row.P0}</td>
                    <td>${row.P100}</td>
                    <td>${row.Sakit}</td>
                    <td>${row.Izin}</td>
                `;
                rekapanTableBody.appendChild(tr);
            });

            // Sembunyikan spinner setelah data siap
            loadingSpinner.style.display = 'none';
        });
    } else {
        loadingSpinner.style.display = 'none';
    }
}
