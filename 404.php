<?php
/**
 * 
 * Default 404.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="ditto_404_error">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-12 col-md-4">
				<h1>404</h1>
			</div>
			<div class="col-12 col-md-5">
				<?php if(get_bloginfo("language") == "en-US"):?>
					<p>Oops! this page <br> not available.</p>
				<?php else: ?> 
					<p>¡Oops! esta página <br> no está disponible.</p>
				<?php endif; ?>
			</div>
			<div class="col-12 text-center">
				<a href="<?= home_url(); ?>">
					<?php if(get_bloginfo("language") == "en-US"):?>
						Return to the home page
					<?php else: ?> 
						Regresa a la página de inicio
					<?php endif; ?>
				</a>
			</div>
			<div class="svg-container">
				<svg xmlns="http://www.w3.org/2000/svg" width="405.059" height="282.018" viewBox="0 0 405.059 282.018">
					<g id="Grupo_117" data-name="Grupo 117" transform="translate(-14028.654 -719.082)">
						<g id="Grupo_110" data-name="Grupo 110" style="isolation: isolate">
						<g id="Grupo_108" data-name="Grupo 108">
							<path id="Trazado_73" data-name="Trazado 73" d="M14144.846,748.713l120.393-27.974,63.115,65.062Z" fill="#002d74" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						<g id="Grupo_109" data-name="Grupo 109">
							<path id="Trazado_74" data-name="Trazado 74" d="M14328.354,785.8l-7.713,68.06-183.508-37.088,7.713-68.06Z" fill="#002d74" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						</g>
						<g id="Grupo_113" data-name="Grupo 113" style="isolation: isolate">
						<g id="Grupo_111" data-name="Grupo 111">
							<path id="Trazado_75" data-name="Trazado 75" d="M14369.025,827.754l63.03,65.107-120.3,27.958Z" fill="#002d74" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						<g id="Grupo_112" data-name="Grupo 112">
							<path id="Trazado_76" data-name="Trazado 76" d="M14432.056,892.86l-7.714,68.06-120.3,27.958,7.713-68.06Z" fill="#002d74" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						</g>
						<g id="Grupo_116" data-name="Grupo 116" style="isolation: isolate">
						<g id="Grupo_114" data-name="Grupo 114">
							<path id="Trazado_77" data-name="Trazado 77" d="M14133.327,751.388l166.845,172.128q-77.518,14.739-137.6,1.834-60.1-12.96-98.216-52.342c-25.664-26.385-32.51-49.835-20.816-70.384Q14061.21,771.7,14133.327,751.388Z" fill="#002d74" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						<g id="Grupo_115" data-name="Grupo 115" style="isolation: isolate">
							<path id="Trazado_78" data-name="Trazado 78" d="M14030.558,886.489l7.715-68.06q-2.812,24.813,26.088,54.579,38.237,39.413,98.216,52.342,60.085,12.947,137.6-1.834l-7.714,68.06q-77.518,14.739-137.595,1.834-60.1-12.96-98.217-52.342Q14027.687,911.294,14030.558,886.489Z" fill="#002d74"/>
							<path id="Trazado_79" data-name="Trazado 79" d="M14030.558,886.489l7.715-68.06q-2.812,24.813,26.088,54.579,38.237,39.413,98.216,52.342,60.085,12.947,137.6-1.834l-7.714,68.06q-77.518,14.739-137.595,1.834-60.1-12.96-98.217-52.342Q14027.687,911.294,14030.558,886.489Z" fill="none" stroke="#ffd100" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.314"/>
						</g>
						</g>
					</g>
				</svg>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>