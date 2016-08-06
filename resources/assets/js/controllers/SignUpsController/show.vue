<template>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sign Up Details
                </div>
                <div class="panel-body">
                    <img src="https://www.gravatar.com/avatar/{{ signUp.emailHash }}" width="80px" height="80px" alt="" class="center-block img-circle" style="margin-bottom: 18px;">
                    <dl>
                        <dt>Name</dt>
                        <dd>{{ signUp.first_name }} {{ signUp.last_name }}</dd>
                        <dt>Email</dt>
                        <dd>{{ signUp.email }}</dd>
                        <dt>Company</dt>
                        <dd>{{ signUp.company ? signUp.company : 'None'  }}</dd>
                        <dt>Position</dt>
                        <dd>{{ signUp.position ? signUp.position : 'None'  }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#core" data-toggle="tab">Core Information</a></li>
                        <li><a href="#social" data-toggle="tab">Social Information</a></li>
                        <li class="pull-right"><a href="#notes" data-toggle="tab">Notes</a></li>
                    </ul>
                    <!-- CORE TAB PANE -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="core">
                            <dl>
                                <dt>Phone</dt>
                                <dd>{{ signUp.phone ? signUp.phone : 'None'  }}</dd>
                                <dt>Mobile</dt>
                                <dd>{{ signUp.mobile ? signUp.mobile : 'None'  }}</dd>
                                <dt>Fax</dt>
                                <dd>{{ signUp.fax ? signUp.fax : 'None'  }}</dd>
                                <dt>Address Line 1</dt>
                                <dd>{{ signUp.address1 ? signUp.address1 : 'None'  }}</dd>
                                <dt>Address Line 2</dt>
                                <dd>{{ signUp.address2 ? signUp.address2 : 'None'  }}</dd>
                                <dt>City</dt>
                                <dd>{{ signUp.city ? signUp.city : 'None'  }}</dd>
                                <dt>State</dt>
                                <dd>{{ signUp.state ? signUp.state : 'None'  }}</dd>
                                <dt>Zipcode</dt>
                                <dd>{{ signUp.zip ? signUp.zip : 'None'  }}</dd>
                                <dt>Country</dt>
                                <dd>{{ signUp.country ? signUp.country : 'None'  }}</dd>
                                <dt>Website</dt>
                                <dd>{{ signUp.website ? signUp.website : 'None'  }}</dd>
                            </dl>
                        </div>

                        <!-- SOCIAL TAB PANE -->
                        <div class="tab-pane" id="social">
                            <dl>
                                <dt>Twitter</dt>
                                <dd>{{ signUp.twitter ? signUp.twitter : 'None'  }}</dd>
                                <dt>Google+</dt>
                                <dd>{{ signUp.google_plus ? signUp.google_plus : 'None'  }}</dd>
                                <dt>Skype</dt>
                                <dd>{{ signUp.skype ? signUp.skype : 'None'  }}</dd>
                                <dt>LinkedIn</dt>
                                <dd>{{ signUp.linked_in ? signUp.linked_in : 'None'  }}</dd>
                                <dt>Instagram</dt>
                                <dd>{{ signUp.instagram ? signUp.instagram : 'None'  }}</dd>
                                <dt>Foursquare</dt>
                                <dd>{{ signUp.foursquare ? signUp.foursquare : 'None'  }}</dd>
                            </dl>
                        </div>

                        <!-- NOTES TAB PANE -->
                        <div class="tab-pane" id="notes">
                            <h2>Notes</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                signUp: {}
            };
        },
        methods: {
            getSignUp(){
                this.$http.get('/api/v1/signup/' + this.$route.params.signUpId)
                    .then(r => {
                        this.signUp = r.data;
                    })
                    .catch(e => {
                        console.error(e);
                    });
            }
        },
        ready(){
            this.getSignUp();
        }
    }
</script>
