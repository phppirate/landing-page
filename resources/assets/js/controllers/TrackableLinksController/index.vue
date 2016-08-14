<template>
    <div class="panel panel-default">
        <div class="panel-heading">Metrics</div>
        <div class="panel-body" style="height: 420px">
            <canvas id="metrics" width="600" height="400"></canvas>
        </div>
    </div>
    <div class="panel panel-default">
        <h1 class="panel-heading">Trackable Links</h1>
        <div class="list-group">
            <a v-for="link in links" v-link="'/trackable-links/' + link.id" class="list-group-item">
                {{ link.name }}
                <div class="pull-right">
                    <span class="ti ti-hand-point-up"></span>
                    <span class="badge">{{ link.clicks.length }}</span>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                links: []
            };
        },
        methods: {
            getLinks(){
                this.$http.get('/api/v1/trackable-link')
                    .then(r => {
                        this.links = r.data;
                        this.$nextTick(function(){
                            this.prepCharts();
                        });
                    })
                    .catch(e => {
                        console.error(e);
                    });
            },
            prepCharts(){

                let labels = this.links.map(function(item){
                    return item.name;
                });

                let clicks = this.links.map(function(item){
                    return item.clicks.length;
                });

                let signUps = this.links.map(function(item){
                    return item.sign_ups.length;
                });

                var data = {
                    labels: labels,
                    datasets: [
                        {
                            label: "Clicks",
                            fillColor: "rgba(52,59,66,1)",
                            strokeColor: "rgba(52,59,66,1)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: clicks
                        },
                        {
                            label: "Sign Ups",
                            fillColor: "rgba(0,150,228,1)",
                            strokeColor: "rgba(0,150,228,1)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: signUps
                        }
                    ]
                };
                let el = document.getElementById('metrics').getContext("2d");
                let chart = new Chart(el).Bar(data, {
                    responsive: true,
                    maintainAspectRatio: false,
                    height: "400px"
                });
            }
        },
        ready(){
            this.getLinks();
        }
    }
</script>
