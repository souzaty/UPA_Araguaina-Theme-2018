<?php
/* Template Name: Transparência */
/**
 * @package WordPress
 * @subpackage HMA
 * @since HMA 1.0
*/
?>
<?php get_header(); ?>
<div id="transparencia-hma">
   <header>
      <div class="intro-heading">
         <div class="container">
            <div class="row campo-pesquisa">
               <div class="col-lg-12">
                  <form class="busca-transparencia" role="search" id="busca-transparencia" method="get" action="<?php echo get_site_url(); ?>/transparencia-resultado/">
                     <div class="input-group">
                        <div class="input-group-btn">
                           <!-- Aqui -->
                           <?php
                              $busca_unidade_id = get_categories('post_type=transparencia&parent=0&hide_empty=0&value_field=slug&taxonomy=Tipo+documento&orderby=taxonomy_slug=Tipo+documento&hierarchical=1&depth=1&order=ASC');
                              $busca_unidade_id = wp_list_pluck($busca_unidade_id, 'slug');
                              $busca_unidade_id = implode(", ", $busca_unidade_id);
                              $select           = wp_dropdown_categories('show_option_none=Unidades&option_none_value=' . $busca_unidade_id . '&hide_empty=0&echo=0&id=unidadeSelect&name=unidadeSelect&class=btn btn-default dropdown-toggle filtro-label&post_type=transparencia&value_field=slug&taxonomy=Tipo+documento&orderby=taxonomy_slug=Tipo+documento&hierarchical=1&depth=1&order=ASC');
                              $replace          = "<select$1 onchange='alteraAction(this.value)' class='btn btn-default dropdown-toggle filtro-label'>";
                              $select           = preg_replace('#<select([^>]*)>#', $replace, $select);
                              echo $select;
                              ?>
                        </div>
                        <div class="input-group-btn">
                           <?php
                              $busca_ano_id = get_categories('post_type=transparencia&parent=0&hide_empty=0&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&hierarchical=1&depth=1&order=ASC');
                              $busca_ano_id = wp_list_pluck($busca_ano_id, 'slug');
                              $busca_ano_id = implode(", ", $busca_ano_id);
                              $select       = wp_dropdown_categories('show_option_none=Periodo&option_none_value=' . $busca_ano_id . '&hide_empty=0&echo=0&id=anoSelect&name=anoSelect&class=btn btn-default dropdown-toggle filtro-label periodo&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano=1&depth=1&order=ASC');
                              $replace      = "<select$1 onchange='alteraAction(this.value)' class='btn btn-default dropdown-toggle filtro-label'>";
                              $select       = preg_replace('#<select([^>]*)>#', $replace, $select);
                              echo $select;
                              ?>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control input-label" aria-label="..." type="search" name="pesquisa_transparencia" id="pesquisa_transparencia">
                        <span class="input-group-btn">
                        <button class="btn btn-default pesquisa-label" type="submit">Pesquisar</button>
                        </span>
                     </div>
                  </form>
                  <!-- /input-group -->
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Section Numeros full width -->
   <section id="numeros-full" class="ghost">
      <div class="container">
         <div class="row gutter-0">
            <?php include 'includes/hma-section_numbers_full.php'; ?>
         </div>
      </div>
   </section>
   <!-- Section Transparencia -->
   <section id="transparencia">
      <div class="container">
         <div class="row">
            <div class="col-md-9 col-sm-12">
               <?php
                  $wp_query = new WP_Query();
                  $wp_query->query('post_type=transparencia&taxonomy=Ano');
                  ?>
               <?php
                  $wp_query = new WP_Query();
                  $wp_query->query('post_type=transparencia&taxonomy=Ano&2017&tipo-documento=hma');
                  ?>
               <?php
                  if($wp_query->have_posts()):
                              while($wp_query->have_posts()):
                                          $wp_query->the_post();
                  ?>
               <?php
                  //echo get_the_category_list();
                  endwhile;
                  endif;
                  wp_reset_query();
                  ?>
               <div class="panel-group" id="accordion">
                  <!-- ############## TAB 01 ############## -->
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="title-panel collapsed">
                           Financeiro e Contábil</a>
                        </h4>
                     </div>
                     <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="bloco">
                                    <div class="bloco-head">
                                       <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-lg-12">
                                             <?php
                                                $select  = wp_dropdown_categories('echo=0&id=ano_busca&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&order=DESC');
                                                $replace = "<select$1 onchange='alterar_div()'>";
                                                $select  = preg_replace('#<select([^>]*)>#', $replace, $select);
                                                echo $select;
                                                ?>
                                             <span id="ano_busca_label"> <i class="fa fa-filter" aria-hidden="true"></i> Selecione o per&iacute;odo: </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="bloco-body">
                                       <div class="col-xs-12 col-sm-4 col-lg-4 no-padding left">
                                          <ul class="nav nav-tabs tabs-left ">
                                             <li class="active"><a href="#hmabalancetes" data-toggle="tab"
                                                aria-expanded="false">Balancetes</a></li>
                                             <li class=""><a href="#balancos" data-toggle="tab"
                                                aria-expanded="false">Balanços</a></li>
                                          </ul>
                                       </div>
                                       <div class="col-xs-12 col-sm-8 col-lg-8 no-padding right">
                                          <div id="content-transparencia" class="tab-content">
                                             <div class="tab-pane  active" id="hmabalancetes">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=balancetes&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                             <div class="tab-pane" id="balancos">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=balancos&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ############## TAB 02 ############## -->
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="title-panel collapsed">
                           Recursos Humanos</a>
                        </h4>
                     </div>
                     <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="bloco">
                                    <div class="bloco-head">
                                       <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-lg-12">
                                             <?php
                                                $select  = wp_dropdown_categories('echo=0&id=ano_busca&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&order=DESC');
                                                $replace = "<select$1 onchange='alterar_div()'>";
                                                $select  = preg_replace('#<select([^>]*)>#', $replace, $select);
                                                echo $select;
                                                ?>
                                             <span id="ano_busca_label"> <i class="fa fa-filter" aria-hidden="true"></i> Selecione o per&iacute;odo: </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="bloco-body">
                                       <div class="col-xs-12 col-sm-4 col-lg-4 no-padding left">
                                          <ul class="nav nav-tabs tabs-left ">
                                             <li class="active"><a href="#hrg" data-toggle="tab"
                                                aria-expanded="false">Relação de Gestores</a></li>
                                             <li class=""><a href="#processos-seletivos" data-toggle="tab"
                                                aria-expanded="false">Processos Seletivos</a></li>
                                             <li class=""><a href="#ses" data-toggle="tab"
                                                aria-expanded="false">Transfer&ecirc;ncia de servidores SES</a></li>
                                             <li class=""><a href="#organograma" data-toggle="tab"
                                                aria-expanded="false">Organograma</a></li>
                                          </ul>
                                       </div>
                                       <div class="col-xs-12 col-sm-8 col-lg-8 no-padding right">
                                          <div id="content-transparencia" class="tab-content">
                                             <div class="tab-pane  active" id="hrg">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=relacao-de-gestores&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                             <div class="tab-pane" id="processos-seletivos">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=processos-seletivos&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                             <div class="tab-pane" id="ses">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=transferencia-ses&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                             <div class="tab-pane" id="organograma">
                                                <?php
                                                   $wp_query = new WP_Query();
                                                   $wp_query->query('post_type=transparencia&tipo-documento=organograma&posts_per_page=100');
                                                   $count = 0;
                                                   ?>
                                                <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ############## TAB 03 ############## -->
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="title-panel collapsed">
                           Administrativo</a>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="bloco">
                                       <div class="bloco-head">
                                          <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-lg-12">
                                                <?php
                                                   $select  = wp_dropdown_categories('echo=0&id=ano_busca&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&order=DESC');
                                                   $replace = "<select$1 onchange='alterar_div()'>";
                                                   $select  = preg_replace('#<select([^>]*)>#', $replace, $select);
                                                   echo $select;
                                                   ?>
                                                <span id="ano_busca_label"> <i class="fa fa-filter" aria-hidden="true"></i> Selecione o per&iacute;odo: </span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="bloco-body">
                                          <div class="col-xs-12 col-sm-4 col-lg-4 no-padding left">
                                             <ul class="nav nav-tabs tabs-left ">
                                                <li class="active"><a href="#alvaras" data-toggle="tab"
                                                   aria-expanded="false">Alvarás</a></li>
                                                <li class=""><a href="#atas" data-toggle="tab"
                                                   aria-expanded="false">Atas</a></li>
                                                <li class=""><a href="#comissoes" data-toggle="tab"
                                                   aria-expanded="false">Comissões</a></li>
                                                <li class=""><a href="#pareceres" data-toggle="tab"
                                                   aria-expanded="false">Pareceres</a></li>
                                                <li class=""><a href="#processo-de-aquisicao" data-toggle="tab"
                                                   aria-expanded="false">Processos de Aquisição</a></li>
                                                <li class=""><a href="#relatorio-de-atividades" data-toggle="tab"
                                                   aria-expanded="false">Relatório de Atividades</a></li>
                                             </ul>
                                          </div>
                                          <div class="col-xs-12 col-sm-8 col-lg-8 no-padding right">
                                             <div id="content-transparencia" class="tab-content">
                                                <div class="tab-pane  active" id="alvaras">
                                                   <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                                </div>
                                                <div class="tab-pane" id="alvaras">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=alvaras&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                                </div>
                                                <div class="tab-pane" id="atas">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=atas&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                                </div>
                                                <div class="tab-pane" id="comissoes">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=comissoes&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                                <div class="tab-pane" id="pareceres">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=pareceres&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                                <div class="tab-pane" id="processo-de-aquisicao">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=processos-de-aquisicao&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php include 'includes/transparencia-resultado-lista.php'; ?>
                                                </div>
                                                <div class="tab-pane" id="relatorio-de-atividades">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=relatorios-de-atividades&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ############## TAB 04 ############## -->
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="title-panel collapsed">
                              Regulamentos e Contratos</a>
                           </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="bloco">
                                       <div class="bloco-head">
                                          <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-lg-12">
                                                <?php
                                                   $select  = wp_dropdown_categories('echo=0&id=ano_busca&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&order=DESC');
                                                   $replace = "<select$1 onchange='alterar_div()'>";
                                                   $select  = preg_replace('#<select([^>]*)>#', $replace, $select);
                                                   echo $select;
                                                   ?>
                                                <span id="ano_busca_label"> <i class="fa fa-filter" aria-hidden="true"></i> Selecione o per&iacute;odo: </span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="bloco-body">
                                          <div class="col-xs-12 col-sm-4 col-lg-4 no-padding left">
                                             <ul class="nav nav-tabs tabs-left ">
                                                <li class="active"><a href="#contatratos-de-gestao" data-toggle="tab"
                                                   aria-expanded="false">Contratos de Gestão</a></li>
                                                <li class=""><a href="#regulamentos" data-toggle="tab"
                                                   aria-expanded="false">Regulamentos</a></li>
                                                <li class=""><a href="#resumo-de-contratos" data-toggle="tab"
                                                   aria-expanded="false">Resumo de Contatos</a></li>
                                             </ul>
                                          </div>
                                          <div class="col-xs-12 col-sm-8 col-lg-8 no-padding right">
                                             <div id="content-transparencia" class="tab-content">
                                                <div class="tab-pane  active" id="contratos-de-gestao">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=contrato-de-gestao&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                                <div class="tab-pane" id="resumo-de-contratos">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=resumo-de-contratos&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                                <div class="tab-pane" id="regulamentos">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=regulamento-de-compras&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End TAB 04-->
                     </div>
                     <!-- ############## TAB 05 ############## -->
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="title-panel collapsed">
                              Indicadores de Desempenho</a>
                           </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="bloco">
                                       <div class="bloco-head">
                                          <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-lg-12">
                                                <?php
                                                   $select  = wp_dropdown_categories('echo=0&id=ano_busca&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&order=DESC');
                                                   $replace = "<select$1 onchange='alterar_div()'>";
                                                   $select  = preg_replace('#<select([^>]*)>#', $replace, $select);
                                                   echo $select;
                                                   ?>
                                                <span id="ano_busca_label"> <i class="fa fa-filter" aria-hidden="true"></i> Selecione o per&iacute;odo: </span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="bloco-body">
                                          <div class="col-xs-12 col-sm-4 col-lg-4 no-padding left">
                                             <ul class="nav nav-tabs tabs-left ">
                                                <li class="active"><a href="#contatratos-de-gestao" data-toggle="tab"
                                                   aria-expanded="false">Relatório de Resultados</a></li>
                                             </ul>
                                          </div>
                                          <div class="col-xs-12 col-sm-8 col-lg-8 no-padding right">
                                             <div id="content-transparencia" class="tab-content">
                                                <div class="tab-pane  active" id="contratos-de-gestao">
                                                   <?php
                                                      $wp_query = new WP_Query();
                                                      $wp_query->query('post_type=transparencia&tipo-documento=relatorio-de-resultados&posts_per_page=100');
                                                      $count = 0;
                                                      ?>
                                                   <?php
                                                      include 'includes/transparencia-resultado-lista.php';
                                                      ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ############## End TAB 05 ############## -->
                  </div>
               </div>
               <!-- End Toggle -->
            </div>
            <!-- Fim Aqui -->
            <!-- contact form -->
            <div class="col-md-3 col-sm-12">
               <div class="conteiner-transparencia-form">
                  <h4>N&atilde;o encontrou o que procura?</h4>
                  <p>Valorizamos uma gest&atilde;o transparente. Preencha os dados abaixo e solicite.</p>
                  <?php echo do_shortcode("[gravityform id=3 title=false description=false ajax=true tabindex=49]"); ?>
               </div>
               <p class="procurar-indicador-sidebar center">
                  ou ligue para (63) 3413-7428
               </p>
               <p class="procurar-indicador-sidebar center">
                  <a href="mailto:sau.hma@ibghto.org.br">sau.hma@ibghto.org.br</a>
               </p>
            </div>
         </div>
      </div>
   </section>
</div>
<?php get_footer(); ?>
