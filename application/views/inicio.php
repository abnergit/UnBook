
<article class="row" id="inicio">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div id="container-fluid">
            	<div class="well"></br>
						<h3>Seja Bem-Vind@!</h3>
						</br>
						<?php 
						foreach ($data as $linha)
							?>
						<h3>
						<?php
							print_r($linha['dsc_nome']);
						?>
						</h3>
						<h3>
						<?php
							print_r($this->session->userdata('cpf'));
						?>
						</h3>
						</br></br></br>
				</div>
        	</div>
		</div>
	</div>
</article>
