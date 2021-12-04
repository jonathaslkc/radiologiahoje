<?php






# Resgata o ID do POST
function get_post_id(){
    return get_the_ID();
}
 
# Resgata a quantidade de visualizações que um POST contém
function getPostViews(){
    
    $postID = get_post_id();
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __('Nenhuma Visualização');
    }
    
    if($count == 1){
        return __('1 Visualização');
    }
    
    return $count.__(' Visualizações');
}

# Registra/Atualiza o contador do POST
add_action('wp_head', 'setPostViews');
function setPostViews() {
    
    $postID = get_post_id();
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
