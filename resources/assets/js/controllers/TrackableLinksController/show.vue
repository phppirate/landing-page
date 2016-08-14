<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ link.name }} - Metrics</div>
        <div class="panel-body" style="height: 420px">
            <canvas id="metrics" width="600" height="400"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Clicks</div>
                <div class="list-group">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Sign Ups</div>
                <div class="list-group">
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                link: {}
            };
        },
        methods: {
            getLink(){
                this.$http.get('/api/v1/trackable-link/' + this.$route.params.trackableLinkId)
                    .then(r => {
                        this.link = r.data;
                        this.$nextTick(function(){
                            this.prepCharts();
                        });
                    })
                    .catch(e => {
                        console.error(e);
                    });
            },
            prepCharts(){

                let labels = ['1','2','3','4','5'];

                let clicks = this.link.clicks.map(function(click){
                    return click.created_at;
                });

                let signUps = this.link.sign_ups.map(function(sign_up){
                    return sign_up.created_at;
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
            this.getLink();
        }
    }
</script>
