<template>
		<div class="addvertise container">
			<h3>Advertisement</h3>
          <!-- 	<div class="container"> -->
              
              	<form class="form-horizontal" method="POST" v-on:submit.prevent="sendAd">

      	           <div class="form-group">
      					    <label for="category" class="col-md-4 control-label">Select Category</label>
      					    <div class="col-md-6">
      						    <select class="form-control" id="category" v-model="category" v-on:change="onChange" required>					
      							  <option value="business">Business</option>
      						      <option value="personal">Personal</option>
      						      <option value="education">Education</option>
      						      <option value="hotels">Hotels</option>
      						      <option value="healthcare">Healthcare</option>
      						      <option value="beauty">Beauty & Spa</option>
      						      <option value="real_estate">Real estate</option>
      						      <option value="financial">Financial</option>
      						      <option value="events">Events & Wedding</option>
      						      <option value="services">Services & Repairs</option>
      						      <option value="agriculture">Agriculture</option>
      						      <option value="food">Food & Fruits</option>
      						      <option value="auto">Auto (Car&Bike)</option>

      						    </select>
      						</div>
      					</div>

      					<div class="form-group">
      					    <label for="user" class="col-md-4 control-label">Total User</label>
      					    <div class="col-md-6">
      						    <label class="control-label">{{user}}</label>
      						</div>
      					</div>

					      <div class="form-group">
	                    <label for="message" class="col-md-4 control-label">Message</label>
	                    <div class="col-md-6">
	                      <textarea class="form-control" rows="5" id="message" v-model="message" required></textarea>                  
	                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                                Send
                        </button>
                    </div>
                </div>
            	</form>
             {{msg}}
          	<!-- </div> -->
        </div> 	 
</template>

<script type="text/javascript">
export default 
{
	data() {
         return {
         	category:'',
         	user:'',
         	message:'',
          msg:''
         }
     },
  	methods: 
    {
        onChange ()
        {
        	axios.get('/getusers/'+this.category).then(response => {
              this.errors = {}
               this.user = response.data;

            }).catch(({response}) => {
                this.errors =response.data.errors 
            });
        },

        sendAd()
        {
        	alert(this.category +" " +this.message);

          axios.post('/sendAd',
            {'category':this.category,
              'message':this.message}).then(response => {
              this.errors = {}
               this.msg = response.data;

            }).catch(({response}) => {
                this.errors =response.data.errors 
            });

        }




        
    }  
}
</script>