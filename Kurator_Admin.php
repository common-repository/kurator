<?php

add_action('admin_menu', 'kurator_add_admin_menu');

function kurator_register_mysettings() { 
	register_setting('kurator-group', 'kurator-box-analytic');
	register_setting('kurator-group', 'kurator-box-color-btn');
	register_setting('kurator-group', 'kurator-box-color-txt');
	register_setting('kurator-group', 'kurator-box-font-size');
	register_setting('kurator-group', 'kurator-box-border-radius');
	register_setting('kurator-group', 'kurator-box-color-btn-hover');
	register_setting('kurator-group', 'kurator-box-color-txt-hover');
	register_setting('kurator-group', 'kurator-box-color-btn-important');
	register_setting('kurator-group', 'kurator-box-color-txt-important');
	register_setting('kurator-group', 'kurator-box-font-size-important');
	register_setting('kurator-group', 'kurator-box-border-radius-important');
	register_setting('kurator-group', 'kurator-box-color-btn-hover-important');
	register_setting('kurator-group', 'kurator-box-color-txt-hover-important');
}

function kurator_add_admin_menu()
{   
    add_menu_page('Kurator', 'Kurator', 'manage_options', 'kuratox-box', 'kurator_home_html'); 
	add_action('admin_init', 'kurator_register_mysettings');
}

function kurator_home_html()
{
	?>
	<h1> <?php echo get_admin_page_title(); ?></h1>
	
	<form method="post" action="options.php">
		<?php settings_fields( 'kurator-group' ); ?>
		<?php do_settings_sections( 'kurator-group' ); ?>
		<table class="form-table">
    		<h3>Analytics</h3>
			<tr valign="top">
				<th scope="row">Activer Analytic</th>
				<td>
					<?php 
					if(get_option('kurator-box-analytic')) {
						echo '<input type="checkbox" name="kurator-box-analytic" value="kurator-box-analytic" checked/>&nbsp;&nbsp;&nbsp;&nbsp;Données enregistrées dans la catégorie Kurator avec l\'action redirect';
					}
					else {
						echo '<input type="checkbox" name="kurator-box-analytic" value="kurator-box-analytic" />';
					}
		?>	
				</td>
			</tr>
		</table>
		<table class="form-table">
    		<h3>Bouton</h3>
			<tr valign="top">
				<th scope="row">Couleur du bouton</th>
				<td>
					<input type=color name="kurator-box-color-btn" value="<?php echo (get_option('kurator-box-color-btn')) ? get_option('kurator-box-color-btn') : '#0086E1'?>">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-color-btn-important"  value="kurator-box-color-btn-important" <?php echo (get_option('kurator-box-color-btn-important')) ? 'checked' : ''?>>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Couleur du texte du bouton</th>
				<td>
					<input type=color name="kurator-box-color-txt" value="<?php echo (get_option('kurator-box-color-txt')) ? get_option('kurator-box-color-txt') : '#ffffff'?>">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-color-txt-important"  value="kurator-box-color-txt-important" <?php echo (get_option('kurator-box-color-txt-important')) ? 'checked' : ''?>>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Couleur du bouton (au survol)</th>
				<td>
					<input type=color name="kurator-box-color-btn-hover" value="<?php echo (get_option('kurator-box-color-btn-hover')) ? get_option('kurator-box-color-btn-hover') : '#006fb9'?>">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-color-btn-hover-important"  value="kurator-box-color-btn-hover-important" <?php echo (get_option('kurator-box-color-btn-hover-important')) ? 'checked' : ''?>>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Couleur du texte du bouton (au survol)</th>
				<td>
					<input type=color name="kurator-box-color-txt-hover" value="<?php echo (get_option('kurator-box-color-txt-hover')) ? get_option('kurator-box-color-txt-hover') : '#ffffff'?>">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-color-txt-hover-important"  value="kurator-box-color-txt-hover-important" <?php echo (get_option('kurator-box-color-txt-hover-important')) ? 'checked' : ''?>>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Taille du texte</th>
				<td>
					<input type=number name="kurator-box-font-size" value="<?php echo (get_option('kurator-box-font-size')) ? get_option('kurator-box-font-size') : '13'?>">px
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-font-size-important"  value="kurator-box-font-size-important" <?php echo (get_option('kurator-box-font-size-important')) ? 'checked' : ''?>>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Arrondissement du bouton</th>
				<td>
					<input type=number name="kurator-box-border-radius" value="<?php echo (get_option('kurator-box-border-radius')) ? get_option('kurator-box-border-radius') : '5'?>">px
					&nbsp;&nbsp;&nbsp;&nbsp;
					Forcer l'application du paramètre
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=checkbox name="kurator-box-border-radius-important"  value="kurator-box-border-radius-important" <?php echo (get_option('kurator-box-border-radius-important')) ? 'checked' : ''?>>
				</td>
			</tr>
		</table>
		
		<?php submit_button(); ?>

	</form>


	<a href="https://kurator.fr">https://kurator.fr</a>
	<?php
}