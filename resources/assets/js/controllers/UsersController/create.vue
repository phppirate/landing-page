<template>
    <div class="panel panel-default">
        <h1 class="panel-heading" style="margin-top: 0;">Creat User</h1>
        <div class="panel-body">
            <form @submit="handleSubmittion" class="form-horizontal">
                <!-- Name Form Field -->
                <fieldset class="form-group">
                    <label for="name" class="control-label col-md-4">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </fieldset>

                <!-- Email Form Field -->
                <fieldset class="form-group">
                    <label for="email" class="control-label col-md-4">Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </fieldset>

                <!-- Password Form Field -->
                <fieldset class="form-group">
                    <label for="password" class="control-label col-md-4">Password</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </fieldset>

                <!-- Password Confirmation Form Field -->
                <fieldset class="form-group">
                    <label for="password_confirmation" class="control-label col-md-4">Password Confirmation</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                </fieldset>

                <!-- Title Form Field -->
                <fieldset class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            handleSubmittion(e){
                e.preventDefault();
                let form = e.srcElement;
                let data = new FormData(form);
                this.$http.post('/api/v1/user', data)
                    .then(r => {
                        console.success(r.data);
                    })
                    .catch(e => {
                        console.error(e);
                    });
            }
        }
    }
</script>
