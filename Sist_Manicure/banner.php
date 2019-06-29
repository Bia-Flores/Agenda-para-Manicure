	
	<main>
	<!--===========================================================
							SESSÃO BANNER 
	=============================================================-->
	<section id="banner" class="about-section text-center">
		<div class="row">
			<div class="col-lg-12 mx-auto">
				<p> &nbsp; </p>
			
				<script src="../js/jquery-3.4.1.min.js"></script>
				<script src="../js/jssor.slider.min.js"></script>
				<script>
					jQuery(document).ready(function ($) {
						
						var options = {
							$AutoPlay: 1, /*Funciona automaticamente*/
							$Loop:1, /*Roda as imagens em sequencia*/
							$SlideDuration: 500, 
							$Idle:3000,/*Tempo que fica aparecendo a imagem*/
							$PauseOnHover:0,/*Para a transição de slide ao posicionar o mouse */
							$DragOrientation:0 /*Não permite o uso do mouse nos slides*/};
						var jssor_slider1 = new $JssorSlider$('slider1_container', options);
					});
				</script>
				
				<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 100%; margin: 0 auto;">
					<!-- Slides Container -->
					<div data-u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 100%; margin: 0 auto;">
						<div><img data-u="image" src="../image/banner1.png" /></div>
						<div><img data-u="image" src="../image/banner2.png" /></div>
					</div>
				</div>
						
						
						
						
			</div>
		</div>
	</section>
	
	