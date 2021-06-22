<?php

add_action('widgets_init', 'lb_map_registra_widget');

function lb_map_registra_widget()
{
    register_widget('ExibeDados');
}

class ExibeDados extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'lb_map_registra_widget',
            'Exibe os dados do banco de Cidades',
            array('description' => 'Este widget mostra as cidades cadastradas no banco')
        );
    }

    public function widget($args, $instance)
    {
        global $wpdb, $table_prefix;
        $result = $wpdb->get_results('SELECT * FROM ' . $table_prefix . 'lb_map_cidades_uf');
        $count = sizeof($result);
        ?>

        <section class="container-cidade">
            <h3>Atualmente temos <?= $count ?> cidades cadastradas</h3>
            <select name="selectCidades" class="selectCidades">
                <?php
                foreach ($result as $cidade) {
                    ?>
                    <option value="<?= $cidade->id ?>"><?= $cidade->nome_cidade ?></option><?php
                }
                ?>
            </select>
        </section>
        <?php
    }
}