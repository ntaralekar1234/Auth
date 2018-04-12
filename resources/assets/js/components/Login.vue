<template>
					<form class="form-horizontal" method="POST" v-on:submit.prevent="login">
                       

                        <div class="form-group" :class="{ 'has-error': errors.email}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                   	</form>
</template>

<script type="text/javascript">
	export default 
	{   
    	data() {
         return {
            
            email:'',
           
            password:'',
            
            errors:{}
         }
      },
      methods: 
      {
      	login ()
      	{
      		axios.post('/login', {
                'email': this.email,
                'password': this.password,
                            
            }).then(response => {
            	this.errors = {}
                
                location.href="/home";

            }).catch(({response}) => {
                this.errors =response.data.errors 
                
            }); 
      	}
      }
	}
</script>