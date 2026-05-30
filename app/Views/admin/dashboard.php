<?= view('layout/navbar_admin'); ?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.page-header {
    margin-bottom: 30px;
}

.page-header h2 {
    font-size: 28px;
    color: #0a2a3a;
    font-weight: 700;
}

.page-header h2 span {
    color: #00a8ff;
}

.page-header p {
    color: #6a8a9a;
    margin-top: 5px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.card {
    background: white;
    padding: 25px 20px;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
    text-align: center;
    transition: all 0.3s ease;
    border-bottom: 3px solid transparent;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 168, 255, 0.15);
    border-bottom-color: #00a8ff;
}

.card h3 {
    font-size: 14px;
    color: #6a8a9a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.card h2 {
    margin-top: 12px;
    font-size: 32px;
    font-weight: 800;
    color: #0a2a3a;
}

.card .icon {
    font-size: 40px;
    color: #00a8ff;
    margin-bottom: 10px;
}

.chart {
    background: white;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
}

.chart h3 {
    font-size: 18px;
    color: #0a2a3a;
    margin-bottom: 20px;
    font-weight: 700;
}

@media (max-width: 768px) {
    .container {
        margin: 20px auto;
    }
    
    .cards {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .card h2 {
        font-size: 24px;
    }
    
    .card .icon {
        font-size: 30px;
    }
}

@media (max-width: 480px) {
    .cards {
        grid-template-columns: 1fr;
    }
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container">
    <div class="page-header">
        <h2>Dashboard <span>Admin</span></h2>
        <p>Selamat datang, <?= session()->get('username'); ?></p>
    </div>

    <div class="cards">
        <div class="card">
            <div class="icon">
                <i class="fas fa-coins"></i>
            </div>
            <h3>Pendapatan Hari Ini</h3>
            <h2>Rp <?= number_format($pendapatanHariIni,0,',','.'); ?></h2>
        </div>
        <div class="card">
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h3>Total Transaksi</h3>
            <h2><?= $totalTransaksi; ?></h2>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <h3>Total Pendapatan</h3>
            <h2>Rp <?= number_format($totalPendapatan,0,',','.'); ?></h2>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-headphones"></i>
            </div>
            <h3>Total Produk</h3>
            <h2><?= $totalProduk; ?></h2>
        </div>
    </div>

    <div class="chart">
        <h3><i class="fas fa-chart-line"></i> Grafik Transaksi Per Hari</h3>
        <canvas id="chartTransaksi"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const data = {
    labels: <?= json_encode(array_column($grafik, 'tgl')); ?>,
    datasets: [{
        label: 'Jumlah Transaksi',
        data: <?= json_encode(array_column($grafik, 'jumlah')); ?>,
        borderColor: '#00a8ff',
        backgroundColor: 'rgba(0, 168, 255, 0.1)',
        borderWidth: 3,
        fill: true,
        tension: 0.3,
        pointBackgroundColor: '#00a8ff',
        pointBorderColor: '#fff',
        pointRadius: 5,
        pointHoverRadius: 7
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    usePointStyle: true,
                    boxWidth: 10
                }
            },
            tooltip: {
                backgroundColor: '#0a1928',
                titleColor: '#00d4ff',
                bodyColor: '#e0f0ff',
                borderColor: '#00a8ff',
                borderWidth: 1
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#e0eef5'
                },
                ticks: {
                    stepSize: 1
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
};

new Chart(document.getElementById('chartTransaksi'), config);
</script>