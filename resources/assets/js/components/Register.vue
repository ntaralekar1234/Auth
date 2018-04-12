<template>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" v-on:submit.prevent="register">
                       

                        <div class="form-group" :class="{ 'has-error': errors.fname}">
                            <label for="fname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname"  v-model="fname" required autofocus>

                                <span class="help-block" v-if="errors.fname">
                                        <strong>{{ errors.fname.join(", ") }}</strong>
                                 </span>
                                
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.lname}">
                            <label for="lname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" v-model="lname" required autofocus>

                               <span class="help-block" v-if="errors.lname">
                                        <strong>{{ errors.lname.join(", ") }}</strong>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.mobile}">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" v-model="mobile" required autofocus>

                               <span class="help-block" v-if="errors.mobile">
                                        <strong>{{ errors.mobile.join(", ") }}</strong>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.email}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required>

                                <span class="help-block" v-if="errors.email">
                                        <strong>{{ errors.email.join(", ") }}</strong>
                                 </span>
                                
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.password}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" v-model="password" required>
 								
 								<span class="help-block" v-if="errors.password">
                                        <strong>{{ errors.password.join(", ") }}</strong>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script type="text/javascript">
	export default 
	{   
    	data() {
         return {
            fname :'',
            lname :'',
            email:'',
            mobile:'',
            password:'',
            password_confirmation:'',
            errors:{}
         }
      },
      methods: 
      {
      	register ()
      	{
      		axios.post('/register', {
                'fname': this.fname,
                'lname': this.lname,
                'email': this.email,
                'mobile': this.mobile,
                'password': this.password,
                'password_confirmation': this.password_confirmation               
            }).then(response => {
            	this.errors = {}
                location.href="/login";

            }).catch(({response}) => {
                this.errors =response.data.errors 
            }); 
      	}
      }
	}



</script>