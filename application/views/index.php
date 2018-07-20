<div class="col-sm-6 col-md-4">
	<div class="box">
		<div class="box-header">
			<h3>Data Penjualan</h3>
			<small class="block text-muted">Statistik data penjualan barang selama 4 tahun terkahir.</small>
		</div>
		<div class="box-body">
			<canvas data-ui-jp="chart" data-ui-options="
			{
			type: 'bar',
			data: {
				labels: ['2015', '2016', '2017', '2018'],
				datasets: [
					{
						label: 'Barang',
						data: [215, 186, 166, 233],
						fill: true,
						backgroundColor: 'rgba(75,192,192,0.4)',
						borderColor: 'rgba(75,192,192,1)',
						borderWidth: 2
					}
				]
			},
			options: {
				stacked: true
			}
			}
			" height="240">
			</canvas>
		</div>
	</div>
</div>
<div class="col-sm-8">
	<div class="box">
		<div class="box-header light lt">
			<h3>Hasil Data Penjualan</h3>
			<small>Di samping adalah statistik data barang yang berhasil dijual</small>
		</div>
		<div class="box-body">
		<p class="m-a-0">Berdasarkan data di samping, barang yang berhasil dijual pada tahun 2015 sekitar 210 - 220 barang dalam setahunnya. Tahun berikutnya terdapat penurunan sekitar 30% hingga hanya terjual sekitar 170 barang. Tahun 2017 terjadi penurunan yang signifikan dan merupakan tahun penjualan paling rendah. Tahun berikutnya terjadi kenaikan yang cukup drastis sekitar 80%.
			
		</p>
		</div>
	</div>
</div>
<div class="col-sm-8">
	<div class="box">
	<div class="box-header">
		<h3>Feedback Pembeli</h3>
		<small class="block text-muted">Hasil survey para pembeli dalam transaksi selama setahun</small>
	</div>
	<div class="box-body">
		<div data-ui-jp="echarts" data-ui-options="{
			tooltip : {
			trigger: 'item',
			formatter: '{a} <br/>{b} : {c} ({d}%)'
			},
			legend: {
				orient : 'vertical',
				x : 'left',
				data:['Sangat Baik','Baik','Cukup','Buruk','Sangat Buruk']
			},
			calculable : true,
			series : [
				{
					name:'Source',
					type:'pie',
					radius : ['50%', '70%'],
					data:[
						{value:30, name:'Sangat Baik'},
						{value:20, name:'Baik'},
						{value:25, name:'Cukup'},
						{value:15, name:'Buruk'},
						{value:10, name:'Sangat Buruk'}
					]
				}
			]
		}" style="height:300px" >
		</div>
	</div>
	</div>
</div>
<div class="col-sm-12">
		<div class="box">
			<div class="box-header">
			<h3>Statistik Perusahaan</h3>
			<small class="block text-muted">Berikut adalah statistik perusahaan tahun 2018</small>
			</div>
			<div class="box-body">
			<div data-ui-jp="echarts" data-ui-options=" {
				tooltip : {
					trigger: 'axis'
				},
				legend: {
					orient : 'vertical',
					x : 'left',
					y : 0,
					data:['Prediksi Target','Hasil Pencapaian']
				},
				polar : [
					{
						indicator : [
							{ text: 'Penjualan', max: 500},
							{ text: 'Administrasi', max: 500},
							{ text: 'Perkembangan', max: 250},
							{ text: 'Komplain', max: 150},
							{ text: 'Transaksi', max: 1000}
						]
					}
				],
				calculable : true,
				series : [
					{
						name: 'Budget vs spending',
						type: 'radar',
						data : [
							{
								value : [350, 400, 200, 100, 750],
								name : 'Prediksi Target'
							},
							{
								value : [230, 380, 245, 125, 850],
								name : 'Hasil Pencapaian'
							}
						]
					}
				]
			}" style="height:300px" >
			</div>
			</div>
		</div>
</div>