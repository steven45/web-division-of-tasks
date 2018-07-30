<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.285714rem">
		<canvas id="myChart"></canvas>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>

        $.getJSON('<?php echo site_url("admin/ranking") ?>', function(data) {
            // alert(data[0]['nama']);
            var nama = [];
            var hasilV = [];
            for (var i = 0; i < data.length; i++) {
                nama[i] = data[i]['nama'];
                hasilV[i] = data[i]['hasilV'];
            }

        var chartpic = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(chartpic, {
            type: 'line',
            data: {
                labels: nama,
                datasets: [{
                    label: 'Nilai PIC',
                    data: hasilV,
                    // backgroundColor: [
                    //     'rgba(255, 99, 132, 0.2)',
                    //     'rgba(54, 162, 235, 0.2)',
                    //     'rgba(255, 206, 86, 0.2)',
                    //     'rgba(75, 192, 192, 0.2)',
                    //     'rgba(153, 102, 255, 0.2)',
                    //     'rgba(255, 159, 64, 0.2)'
                    // ],
                    borderColor: [
                        'blue'
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                	display: true,
                	text:'Ranking PIC',
                    fontSize: 20,
                    fontColor: '#000'
                }
            },
        });

        });
        </script>
        <br>
        <a class="ui small green button">
		Jadwalkan Sekarang!	</a>
        </div>


</div>
</div>
</div>










