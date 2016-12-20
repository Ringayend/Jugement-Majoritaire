<div class="navbar-fixed">
			  <nav>
			    <?php if (isset($_COOKIE['identifiant'])) { ?>
			    <div class="nav-wrapper white">
			      <a href="/" id="header-logo" class="brand-logo grey-text"><i class="material-icons grey-text">drafts</i></a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons grey-text">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			      	<li><a href="/teacherDashboard" class="grey-text">Mon Compte</a></li>
			        <li><a href="/logout" class="waves-effect waves-light modal-trigger grey-text">Log out</a></li>
			        
			      
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="/compte" class="grey-text modal-trigger modal-trigger">Mon Compte</a></li>
			        <li><a href="/logout" class="grey-text">Log out</a></li>
			      </ul>
			    </div>
			    <?php } ?>

			    <?php if (!isset($_COOKIE['identifiant'])) { ?>
			    <div class="nav-wrapper white">
			      <a href="/" id="header-logo" class="brand-logo grey-text"><i class="material-icons grey-text">drafts</i></a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons light-blue-text text-lighten-2">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="#modalog" class="waves-effect waves-light modal-trigger grey-text">Log in</a></li>
			        <li><a href="/signup" class="waves-effect waves-light modal-trigger grey-text">Sign up</a></li>
			      
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="#modalog" class="light-blue-text text-lighten-2 modal-trigger modal-trigger">Log in</a></li>
			        <li><a href="/signup" class="light-blue-text text-lighten-2">Sign up</a></li>
			      </ul>
			    </div>
			    <?php } ?>


			  </nav>
			 </div>

				  <!-- Modal Structure -->
				  <div id="modalog" class="modal bottom-sheet">
				    	<div class="modal-content">
					      <h4 class="grey-text">Log in</h4>
						      <form class="col s12" action="/connect" method="post">
							     <div class="row center">
							        <div class="input-field col s6 offset-s3">
							        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">perm_identity</i>
							          <input id="login" name="login" type="email" class="validate">
							          <label for="login">Email or login</label>
							        </div>    
							      </div>
							      <div class="row center">
							        <div class="input-field col s6 offset-s3">
							        	<i class="tiny material-icons prefix light-blue-text text-lighten-2">vpn_key</i>
							          	<input id="password" name="password" type="password" class="validate">
							          	<label for="password">Password</label>
							        </div>
							      </div>
							      <div class="row right">
							       <button class="waves-effect waves-light light-blue-text text-lighten-2 btn-flat" type="submit" onclick="/home">Connect</button>
							    </div>
							    </form>
							</div>
				  </div>

				  