<?php
function get_menu_html(): string {
    $main_action = $_GET['action'] ?? 'view'; 

    $sort_options = ['by_name' => 'По имени', 'by_date' => 'По дате', 'by_id' => 'По старости контакта'];
    $active_sort = $_GET['sort'] ?? 'by_name';

    $create_button = function(string $text, string $href, bool $active, string $style = ''): string {
        $color = $active ? 'red' : 'blue';
        $style_attr = "color: $color; background:none; border:none; padding:8px 16px; cursor:pointer; font-size:16px; $style";
        return "<a href=\"$href\" style=\"$style_attr\">$text</a>";
    };

    $menu_items = [
    'view' => 'Просмотр',
    'add' => 'Добавление записи',
    'update' => 'Редактирование записи',
    'delete' => 'Удаление записи'];


    $html = '<div style="margin-bottom:10px;">';
    foreach ($menu_items as $key => $label) {
    $href = "?action=$key";
    $active = ($main_action === $key);
    $html .= $create_button($label, $href, $active);
}

    $html .= '</div>';

    if ($main_action === 'view') {
        $html .= '<div style="margin-left:20px;">';
        foreach ($sort_options as $sort_key => $sort_label) {
            $href = "?action=view&sort=$sort_key";
            $active = ($active_sort === $sort_key);
            $html .= $create_button($sort_label, $href, $active, 'font-size:12px; padding:4px 8px; margin-right:4px;');
        }
        $html .= '</div>';
    }

    return $html;
}
?>
