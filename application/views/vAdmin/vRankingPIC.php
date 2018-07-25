<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.285714rem">
		<canvas id="myChart"></canvas>
        <script>
        var chartpic = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(chartpic, {
            type: 'line',
            data: {
                labels: ["Panji", "Vriza", "Barbara", "Sarah", "Sonya", "Wahyu", "Yuli", "Evangelista", "Saputra", "Hutagaol", "Bambang"],
                datasets: [{
                    label: 'Ranking PIC',
                    data: [12, 19, 23, 5, 30, 3, 18, 10, 4, 31, 40],
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
                    fontSize: 18,
                    fontColor: '#000'
                }
            },
        });
        </script>
        <br>
        <a class="ui small green button">
		Jadwalkan Sekarang!	</a>
        </div>


</div>
</div>
</div>










