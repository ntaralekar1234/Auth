<template>
<div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#edit">Edit Info</a></li>
    <li><a data-toggle="tab" href="#subscribe">Subscribe services</a></li>
  </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>User Info</h3>
            <div class="container">
              <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <center>{{auth_user.fname}} {{auth_user.lname}}</center><br>
                <center>{{auth_user.mobile}}</center><br>
                <center>{{auth_user.email}}</center><br>
              </div>
            </div>  
      </div>
      <div id="edit" class="tab-pane fade">
        <h3>Edit Info</h3>
          <div class="container">
              
                <form class="form-horizontal update-form card" method="POST" v-on:submit.prevent="update">

                  <div class="form-group" :class="{ 'has-error': errors.fname}">
                    <label for="fname" class="col-md-4 control-label">First Name</label>
                    <div class="col-md-6">
                      <input id="fname" type="text" class="form-control" name="fname" v-model="auth_user.fname" required autofocus>
                      <span class="help-block" v-if="errors.fname">
                            <strong>{{ errors.fname.join(", ") }}</strong>
                      </span>                 
                    </div>
                  </div>

                  <div class="form-group" :class="{ 'has-error': errors.lname}">
                    <label for="lname" class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-6">
                      <input id="lname" type="text" class="form-control" name="lname" v-model="auth_user.lname" required autofocus> <span class="help-block" v-if="errors.lname">
                            <strong>{{ errors.lname.join(", ") }}</strong>
                      </span>                 
                    </div>
                  </div>

                  <div class="form-group" :class="{ 'has-error': errors.address}">
                    <label for="address" class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                      <textarea class="form-control" rows="5" id="address" v-model="auth_user.address"></textarea>
                      <span class="help-block" v-if="errors.address">
                            <strong>{{ errors.address.join(", ") }}</strong>
                      </span>                  
                    </div>
                  </div>


                    <div class="form-group" :class="{ 'has-error': errors.tal}">
                    <label for="tal" class="col-md-4 control-label">Tal</label>
                    <div class="col-md-6">
                      <input id="tal" type="text" class="form-control" name="tal" v-model="auth_user.tal" autofocus> 
                      <span class="help-block" v-if="errors.tal">
                            <strong>{{ errors.tal.join(", ") }}</strong>
                      </span>                 
                    </div>
                  </div>

                  <div class="form-group" :class="{ 'has-error': errors.dist}">
                    <label for="dist" class="col-md-4 control-label">Dist</label>
                    <div class="col-md-6">
                      <input id="dist" type="text" class="form-control" name="dist" v-model="auth_user.dist" autofocus> 
                      <span class="help-block" v-if="errors.dist">
                            <strong>{{ errors.dist.join(", ") }}</strong>
                      </span>                 
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                                Update
                          </button>
                      </div>
                  </div>
                </form>
          </div>   
      </div>

      <div id="subscribe" class="tab-pane fade">
        <h3>Subscribe services</h3>
          <div class="container card services" v-if="userservices">
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.business">Business</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.personal">Personal</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.education">Education</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.hotels">Hotels</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.healthcare">Healthcare</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.beauty">Beauty & Spa</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.real_estate">Real estate</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.financial">Financial</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.events">Events & Wedding</label>
            </div>
             <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.services">Services & Repairs</label>
            </div>
             <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.agriculture">Agriculture</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.food">Food & Fruits</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices.auto">Auto (Car&Bike)</label>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" v-on:click="subscribe">
                    Subscribe
                </button>
            </div>
         
          </div>

          <div class="container card services" v-else>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.business">Business</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.personal">Personal</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.education">Education</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.hotels">Hotels</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.healthcare">Healthcare</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.beauty">Beauty & Spa</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.real_estate">Real estate</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.financial">Financial</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.events">Events & Wedding</label>
            </div>
             <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.services">Services & Repairs</label>
            </div>
             <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.agriculture">Agriculture</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.food">Food & Fruits</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" v-model="userservices2.auto">Auto (Car&Bike)</label>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" v-on:click="usersubscribe">
                    Subscribe
                </button>
            </div>
        
          </div>

      </div>

    </div>
</div>
</template>
<script type="text/javascript">
  export default 
  {
    props : ['auth_user','userservices'],
    data() {
         return {
           
            errors:{},
            userservices2:{
              business:0,
              personal:0,
              education:0,
              hotels:0,
              healthcare:0,
              beauty:0,
              real_estate:0,
              financial:0,
              events:0,
              services:0,
              agriculture:0,
              food:0,
              auto:0
            }
         }
      },
    methods: 
      {
        update ()
        {
         // alert(this.auth_user.id);
         axios.post('/userupdate', {
                'id' :this.auth_user.id,
                'fname': this.auth_user.fname,
                'lname': this.auth_user.lname,
                'address' : this.auth_user.address,
                'tal' : this.auth_user.tal,
                'dist' : this.auth_user.dist,              
            }).then(response => {
              this.errors = {}
                location.href="/home";

            }).catch(({response}) => {
                this.errors =response.data.errors 
            });
        },

        subscribe()
        {
          axios.post('/servicesupdate', {
                'id' :this.auth_user.id,
                'business': this.userservices.business,
                'personal': this.userservices.personal,
                'education' : this.userservices.education,
                'hotels' : this.userservices.hotels,
                'healthcare' : this.userservices.healthcare,
                'beauty' : this.userservices.beauty,
                'real_estate' : this.userservices.real_estate,
                'financial' : this.userservices.financial,
                'events' : this.userservices.events,
                'services' : this.userservices.services,
                'agriculture' : this.userservices.agriculture,
                'food' : this.userservices.food,
                'auto' : this.userservices.auto,   
            }).then(response => {
              this.errors = {}
                location.href="/home";

            }).catch(({response}) => {
                this.errors =response.data.errors 
            });
        },
        usersubscribe()
        {
          axios.post('/servicesadd', {
                'id' :this.auth_user.id,
                'business': this.userservices2.business,
                'personal': this.userservices2.personal,
                'education' : this.userservices2.education,
                'hotels' : this.userservices2.hotels,
                'healthcare' : this.userservices2.healthcare,
                'beauty' : this.userservices2.beauty,
                'real_estate' : this.userservices2.real_estate,
                'financial' : this.userservices2.financial,
                'events' : this.userservices2.events,
                'services' : this.userservices2.services,
                'agriculture' : this.userservices2.agriculture,
                'food' : this.userservices2.food,
                'auto' : this.userservices2.auto,   
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