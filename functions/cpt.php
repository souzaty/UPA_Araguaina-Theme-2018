<?php
/** Theme Custom Post Types
 * @package WordPress
 * @subpackage UPA 24hrs
 * @since UPA 24hrs 1.0 Beta
 */

 // Start CPT Corpo Clínico
 add_action('init', 'corpo_clinico_heelj_register');
 function corpo_clinico_heelj_register() {
 	$labels = array(
 		'name' => __('Corpo Cl&iacute;nico', 'Tipo de post para incluir os profissionais da UPA.'),
 		'singular_name' => __('Corpo Cl&iacute;nico', 'post type singular name'),
 		'all_items' => __('Todos profissionais'),
 		'add_new' => _x('Novo profissional', 'Novo profissional'),
 		'add_new_item' => __('Add novo item'),
 		'edit_item' => __('Editar profissional'),
 		'new_item' => __('Novo profissional Item'),
 		'view_item' => __('Ver item do profissional'),
 		'search_items' => __('Procurar profissional'),
 		'not_found' => __('Nenhum profissional encontrado'),
 		'not_found_in_trash' => __('Nenhum profissional encontrado na lixeira'),
 		'parent_item_colon' => ''
 	);
 	$args   = array(
 		'labels' => $labels,
 		'public' => true,
 		'publicly_queryable' => true,
 		'show_ui' => true,
 		'query_var' => true,
 		'menu_icon' => 'dashicons-id',
 		'capability_type' => 'post',
 		'hierarchical' => false,
 		'menu_position' => 6,
 		'taxonomies' => array(
 			'post_tag'
 			),
 		'supports' => array(
 			'title',
 			'thumbnail',
 			'tags'
 			)
 	);
 register_post_type('corpo_clinico_heelj', $args);
 	flush_rewrite_rules();
 }
 register_taxonomy("Especialidades", array(
 	"corpo_clinico_heelj"
 	), array(
 	"hierarchical" => true,
 	"label" => "Especialidades",
 	"singular_label" => "edital",
 	"rewrite" => array(
 		'slug' => 'edital'
 		),
 	"public" => true,
 	"show_ui" => true,
 	"_builtin" => true
 	));
 add_action("admin_init", "campos_personalizados_corpo_clinico_heelj");
 function campos_personalizados_corpo_clinico_heelj() {
 	add_meta_box("corpo_crm", "Informe o CRM", "corpo_crm", "corpo_clinico_heelj", "normal", "low");
 }
 function corpo_crm() {
 	global $post;
 	$custom    = get_post_meta($post->ID);
 	$corpo_crm = $custom["corpo_crm"][0];
 ?>
 	<input type="text" name="corpo_crm" value='<?php echo $corpo_crm;
 	?>' /></p>
 <?php
 }
 add_action('save_post_corpo_clinico_heelj', 'save_details_post_corpo_clinico_heelj');
 function save_details_post_corpo_clinico_heelj() {
 	global $post;
 	update_post_meta($post->ID, "corpo_crm", $_POST["corpo_crm"]);
 }
 // End CPT Corpo Clínico

 // Start CPT Serviços
 add_action('init', 'servicos_heelj');
 function servicos_heelj() {
 	$labels = array(
 		'name' => __('Serviços', 'Tipo de post para incluir os serviços da UPA.'),
 		'singular_name' => __('serviços', 'post type singular name'),
 		'all_items' => __('Todos os serviços'),
 		'add_new' => _x('Novo serviço', 'Novo serviço'),
 		'add_new_item' => __('Add novo serviço'),
 		'edit_item' => __('Editar serviço'),
 		'new_item' => __('Novo serviço Item'),
 		'view_item' => __('Ver item do serviço'),
 		'search_items' => __('Procurar serviço'),
 		'not_found' => __('Nenhum serviço encontrado'),
 		'not_found_in_trash' => __('Nenhum serviço encontrado na lixeira'),
 		'parent_item_colon' => ''
 	);
 	$args   = array(
 		'labels' => $labels,
 		'public' => true,
 		'publicly_queryable' => true,
 		'show_ui' => true,
 		'query_var' => true,
 		'menu_icon' => 'dashicons-admin-generic',
 		'rewrite' => array(
 			'slug' => 'servicos%',
 			'with_front' => false
 		),
 		'capability_type' => 'post',
 		'hierarchical' => false,
 		'menu_position' => 6,
 		'taxonomies' => array(
 			'post_tag'
 		),
 		'supports' => array(
 			'title',
 			'thumbnail',
 			'editor',
 			'excerpt',
 			'revisions'
 		)
 	);
 	register_post_type('servicos-heelj', $args);
 	flush_rewrite_rules();
 }
 add_action("admin_init", "campos_personalizados_servicos_heelj");
 function campos_personalizados_servicos_heelj() {
 	add_meta_box("botao_servico_heelj", "Informe label para o bot&atilde;o", "botao_servico_heelj", "servicos-heelj", "normal", "low");
 	add_meta_box("link_botao_servico_heelj", "Informe o link para o bot&atilde;o", "link_botao_servico_heelj", "servicos-heelj", "normal", "low");
 	add_meta_box("info_servico_heelj", "Informe o texto de informa&ccedil;&atilde;o", "info_servico_heelj", "servicos-heelj", "normal", "low");
 	add_meta_box("link_info_servico_heelj", "Informe o link para que leva a informa&ccedil;&atilde;o", "link_info_servico_heelj", "servicos-heelj", "normal", "low");
 }
 function botao_servico_heelj() {
 	global $post;
 	$custom              = get_post_meta($post->ID);
 	$botao_servico_heelj = $custom["botao_servico_heelj"][0];
 ?>
 	<input type="text" name="botao_servico_heelj" value="<?php echo $botao_servico_heelj;
 	?>" />
 	<?php
 }
 function link_botao_servico_heelj() {
 	global $post;
 	$custom                   = get_post_meta($post->ID);
 	$link_botao_servico_heelj = $custom["link_botao_servico_heelj"][0];
 ?>
 	<input type="text" name="link_botao_servico_heelj" value="<?php echo $link_botao_servico_heelj;
 	?>" />
 	<?php
 }
 function info_servico_heelj()
 {
 	global $post;
 	$custom             = get_post_meta($post->ID);
 	$info_servico_heelj = $custom["info_servico_heelj"][0];
 ?>
 	<input type="text" name="info_servico_heelj" value="<?php echo $info_servico_heelj;
 	?>" />
 	<?php
 }
 function link_info_servico_heelj()
 {
 	global $post;
 	$custom                  = get_post_meta($post->ID);
 	$link_info_servico_heelj = $custom["link_info_servico_heelj"][0];
 ?>
 	<input type="text" name="link_info_servico_heelj" value="<?php echo $link_info_servico_heelj;
 ?>" />
 	<?php
 }
 add_action('save_post_servicos-heelj', 'save_details_post_servicos_heelj');
 function save_details_post_servicos_heelj()
 {
 	global $post;
 	update_post_meta($post->ID, "botao_servico_heelj", $_POST["botao_servico_heelj"]);
 	update_post_meta($post->ID, "link_botao_servico_heelj", $_POST["link_botao_servico_heelj"]);
 	update_post_meta($post->ID, "info_servico_heelj", $_POST["info_servico_heelj"]);
 	update_post_meta($post->ID, "link_info_servico_heelj", $_POST["link_info_servico_heelj"]);
 }
 // End CPT Serviços

// Start CPT Trabalhe Conosco
add_action('init', 'trabalhe_register');
function trabalhe_register()
{
				$product_permalink = 'trabalhe/%Unidades%/';
				$labels            = array(
								'name' => __('Editais', 'Tipo de post para incluir os cursos da escola.'),
								'singular_name' => __('Editais', 'post type singular name'),
								'all_items' => __('Todos editais'),
								'add_new' => _x('Novo edital', 'Novo edital'),
								'add_new_item' => __('Add novo item ao edital'),
								'edit_item' => __('Editar edital'),
								'new_item' => __('Novo edital Item'),
								'view_item' => __('Ver item do edital'),
								'search_items' => __('Procurar edital'),
								'not_found' => __('Nenhum edital encontrado'),
								'not_found_in_trash' => __('Nenhum edital encontrado na lixeira'),
								'parent_item_colon' => ''
				);
				$args              = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-calendar',
								'rewrite' => array(
												'slug' => 'trabalhe/%Unidades%',
												'with_front' => false
								),
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 6,
								'taxonomies' => array(
												'post_tag'
								),
								'supports' => array(
												'title',
												'thumbnail',
												'editor',
												'excerpt',
												'tags'
								)
				);
				register_post_type('trabalhe', $args);
				flush_rewrite_rules();
}
register_taxonomy("Unidades", array(
				"trabalhe"
), array(
				"hierarchical" => true,
				"label" => "Unidades",
				"singular_label" => "edital",
				"rewrite" => array(
								'slug' => 'edital'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
/*Filtro per modificare il permalink*/
add_filter('post_link', 'editais_permalink', 1, 3);
add_filter('post_type_link', 'editais_permalink', 1, 3);
function editais_permalink($permalink, $post_id, $leavename)
{
				//con %brand% catturo il rewrite del Custom Post Type
				if (strpos($permalink, '%Unidades%') === FALSE)
								return $permalink;
				// Get post
				$post = get_post($post_id);
				if (!$post)
								return $permalink;
				// Get taxonomy terms
				$terms = wp_get_object_terms($post->ID, 'Unidades');
				if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
								$taxonomy_slug = $terms[0]->slug;
				else
								$taxonomy_slug = 'no-brand';
				return str_replace('%Unidades%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "campos_personalizados_trabalhe");
function campos_personalizados_trabalhe()
{
				add_meta_box("periodo_edital", "período do edital", "periodo_edital", "trabalhe", "normal", "low");
				add_meta_box("disponibilidade_trabalhe", "Informe a disponibilidade do edital", "disponibilidade_trabalhe", "trabalhe", "normal", "low");
				add_meta_box("link_inscricao", "Informe o shortcode do formulario de inscri&ccedil;&atilde;o", "link_inscricao", "trabalhe", "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_DATA, __('Cargos e Sal&aacute;rios', 'wysiwyg'), 'cargos_salarios', 'trabalhe', "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_CARGA, __('Prazos', 'wysiwyg'), 'carga_horaria_trabalhe', 'trabalhe', "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_INVESTIMENTO, __('Convoca&ccedil;&otilde;es', 'wysiwyg'), 'investimento_trabalhe', 'trabalhe', "normal", "low");
}
function periodo_edital()
{
				global $post;
				$custom      = get_post_meta($post->ID);
				$data_inicio = $custom["data_inicio"][0];
				$data_fim    = $custom["data_fim"][0];
?>
  <label>Informe a data in&iacute;cio:</label>
  <input type="date" name="data_inicio" value="<?php
				echo $data_inicio;
?>" />

  <label>Informe a data fim:</label>
  <input type="date" name="data_fim" value="<?php
				echo $data_fim;
?>" />
  <?php
}
function disponibilidade_trabalhe()
{
				global $post;
				$custom         = get_post_custom($post->ID);
				$disponiblidade = $custom["btn-green-fill"][0];
				$indisponivel   = $custom["btn-grey-fill"][0];
?>
		<input type="radio" name="btn-green-fill" value="1" <?php
				if ($disponiblidade == '1')
								echo "checked=1";
?>>Dispon&iacute;vel
		<input type="radio" name="btn-green-fill" value="2" <?php
				if ($disponiblidade == '2')
								echo "checked=2";
?>>Indisponivel

	<?php
}
function data_detalhada()
{
				global $post;
				$content = get_post_meta($post->ID, 'data_detalhada', true);
				wp_editor(htmlspecialchars_decode($content), 'data_detalhada', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function link_inscricao()
{
				global $post;
				$custom         = get_post_meta($post->ID);
				$link_inscricao = $custom["link_inscricao"][0];
?>
  <p><label>Informe o link:</label><br />
  <input type="text" name="link_inscricao" value='<?php
				echo $link_inscricao;
?>' /></p>
<?php
}
function cargos_salarios()
{
				global $post;
				$content = get_post_meta($post->ID, 'cargos_salarios', true);
				wp_editor(htmlspecialchars_decode($content), 'cargos_salarios', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function carga_horaria_trabalhe()
{
				global $post;
				$content = get_post_meta($post->ID, 'carga_horaria_trabalhe', true);
				wp_editor(htmlspecialchars_decode($content), 'carga_horaria_trabalhe', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function investimento_trabalhe()
{
				global $post;
				$content = get_post_meta($post->ID, 'investimento_trabalhe', true);
				wp_editor(htmlspecialchars_decode($content), 'investimento_trabalhe', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
add_action('save_post_trabalhe', 'save_details_post_trabalhe');
function save_details_post_trabalhe()
{
				global $post;
				update_post_meta($post->ID, "data_inicio", $_POST["data_inicio"]);
				update_post_meta($post->ID, "data_fim", $_POST["data_fim"]);
				if (!empty($_POST['data_detalhada'])) {
								$data = htmlspecialchars($_POST['data_detalhada']);
								update_post_meta($post->ID, 'data_detalhada', $data);
				}
				update_post_meta($post->ID, "btn-green-fill", $_POST["btn-green-fill"]);
				update_post_meta($post->ID, "link_inscricao", $_POST["link_inscricao"]);
				if (!empty($_POST['cargos_salarios'])) {
								$cargos_salarios = htmlspecialchars($_POST['cargos_salarios']);
								update_post_meta($post->ID, 'cargos_salarios', $cargos_salarios);
				}
				if (!empty($_POST['carga_horaria_trabalhe'])) {
								$data_carga_horaria_trabalhe = htmlspecialchars($_POST['carga_horaria_trabalhe']);
								update_post_meta($post->ID, 'carga_horaria_trabalhe', $data_carga_horaria_trabalhe);
				}
				if (!empty($_POST['investimento_trabalhe'])) {
								$data_investimento_trabalhe = htmlspecialchars($_POST['investimento_trabalhe']);
								update_post_meta($post->ID, 'investimento_trabalhe', $data_investimento_trabalhe);
				}
				update_post_meta($post->ID, "upload_banner_trabalhe", $_POST["upload_banner_trabalhe"]);
}
add_filter("manage_edit-trabalhe_columns", "trabalhe_edit_columns");
function trabalhe_edit_columns($columns)
{
				$columns = array(
								"cb" => "<input type=\"checkbox\" />",
								"title" => "Edital",
								"unidade" => "Unidade",
								"periodo_edital" => "período"
				);
				return $columns;
}
add_action("manage_posts_custom_column", "trabalhe_custom_columns");
function trabalhe_custom_columns($column)
{
				global $post;
				switch ($column) {
								case "title":
												the_title();
												break;
								case "unidade":
												echo get_the_term_list($post->ID, 'Unidades', '', ', ', '');
												break;
								case "periodo_edital":
												$custom      = get_post_meta($post->ID);
												$data_inicio = $custom["data_inicio"][0];
												$data_fim    = $custom["data_fim"][0];
												echo date('d/m/Y', strtotime($data_inicio));
												echo " a ";
												echo date('d/m/Y', strtotime($data_fim));
												break;
				}
}
// End CPT Trabalhe Conosco

// Start CPT Transparencia
add_action('init', 'transparencia_register');
function transparencia_register()
{
				$eventos_permalink = 'transparencia';
				$labels            = array(
								'name' => __('Prestação de contass', 'Tipo de post para incluir Prestação de contass.'),
								'singular_name' => __('Prestação de conta', 'post type singular name'),
								'all_items' => __('Todas Prestações de Contas'),
								'add_new' => _x('Nova Prestação de conta', 'Nova Prestação de conta'),
								'add_new_item' => __('Adicionar nova Prestação de conta'),
								'edit_item' => __('Editar Prestação de conta'),
								'new_item' => __('Nova Prestação de conta Item'),
								'view_item' => __('Ver item da Prestação de conta'),
								'search_items' => __('Procurar Prestação de conta'),
								'not_found' => __('Nenhuma Prestação de conta encontrada'),
								'not_found_in_trash' => __('Nenhuma Prestação de conta encontrada na lixeira'),
								'parent_item_colon' => ''
				);
				$args              = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-visibility',
								'rewrite' => array(
												'slug' => 'transparencia',
												'with_front' => false
								),
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 5,
								'supports' => array(
												'title'
								)
				);
				register_post_type('transparencia', $args);
				flush_rewrite_rules();
}
register_taxonomy("Ano", array(
				"transparencia"
), array(
				"hierarchical" => true,
				"label" => "Ano",
				"singular_label" => "Ano",
				"rewrite" => array(
								'slug' => 'ano'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
register_taxonomy("Tipo documento", array(
				"transparencia"
), array(
				"hierarchical" => true,
				"label" => "Tipo Documento",
				"singular_label" => "tipo-documento",
				"rewrite" => array(
								'slug' => 'tipo-documento'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
/* Filtro para modificar permalink */
add_filter('post_link', 'transparencia_permalink', 1, 3);
add_filter('post_type_link', 'transparencia_permalink', 1, 3);
function transparencia_permalink($permalink, $post_id, $leavename)
{
	// con %brand% catturo il rewrite del Custom Post Type
	if (strpos($permalink, '%ano%') === FALSE)
					return $permalink;
	// Get post
	$post = get_post($post_id);
	if (!$post)
					return $permalink;
	// Get taxonomy terms
	$terms = wp_get_object_terms($post->ID, 'Ano');
	if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
					$taxonomy_slug = $terms[0]->slug;
	else
					$taxonomy_slug = 'no-brand';
	return str_replace('%Ano%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "campos_personalizados_transparencia");
function campos_personalizados_transparencia()
{
				add_meta_box("upload_documento_transparencia", "Fa&ccedil;a o upload do documento", "upload_documento_transparencia", "transparencia", "normal", "low");
}
function upload_documento_transparencia()
{
				global $post;
				// Procura o valor da chave 'upload_file'
				$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>

		<p>Clique no botão para fazer o upload de um documento. Após
			o término do upload, clique em <em>Inserir no post</em>.</p>
		<p>
			<input id="upload_image" type="text" size="80"
				name="upload_documento_transparencia" style="width: 85%;"
				value="<?php
				if (!empty($upload_documento_transparencia))
								echo $upload_documento_transparencia;
?>" />

			<input id="upload_image_button" type="button" class="button"
				value="Fazer upload" />
		</p>
		<?php
}
add_action('save_post_transparencia', 'save_details_post_transparencia');
function save_details_post_transparencia()
{
				global $post;
				update_post_meta($post->ID, "upload_documento_transparencia", $_POST["upload_documento_transparencia"]);
}
function buscaTransparencia()
{
				global $post;
				$ano = $_POST['ano_busca'];
?>
		<div class="tab-pane active" id="financeiro">

			<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&tipo-documento=relacao-de-gestores-recursos-humanos-ibgh&posts_per_page=100');
				$count = 0;
?>
			<?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
			<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>


			<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>

				<?php
								endwhile;
				endif;
?>

									</div>

		<div class="tab-pane" id="processo-de-aquisicao">

										<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&meta_key=tipo_pretacao_conta&meta_value=heelj-processo-de-aquisicao&posts_per_page=100');
?>

									    <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
											<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>
											<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>
										<?php
								endwhile;
				endif;
?>

									</div>

		<div class="tab-pane" id="demonstrativo">

										<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&meta_key=tipo_pretacao_conta&meta_value=demonstrativo&posts_per_page=100');
?>

									    <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
											<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>
											<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>

										<?php
								endwhile;
				endif;
?>

									</div>
		<?php
				// doSomeStuff
				die(); // Lembre sempre de finalizar a execução pois, caso contrario o wordpress retornará 0.
}
// Adiciona a funcao extra votos aos hooks ajax do WordPress.
add_action('wp_ajax_buscaTransparencia', 'buscaTransparencia');
add_action('wp_ajax_nopriv_buscaTransparencia', 'buscaTransparencia');
// End CPT Transparência

// Start Excerpt Lenght
function the_excerpt_lenght($before = '', $after = '', $echo = true, $length = false)
{
				$excerpt = get_the_excerpt();
				if ($length && is_numeric($length)) {
								$excerpt = substr($excerpt, 0, $length);
				}
				if (strlen($excerpt) > 0) {
								$excerpt = apply_filters('the_excerpt_lenght', $before . $excerpt . $after, $before, $after);
								if ($echo)
												echo $excerpt;
								else
												return $excerpt;
				}
}
