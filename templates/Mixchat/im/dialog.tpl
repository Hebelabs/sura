<div id="okim{uid}">
    <div class="im_oneusr cursor_pointer" onClick="im.open('{uid}')" onMouseOver="$('#deia{uid}').show()"
         onMouseOut="$('#deia{uid}').hide()" id="dialog{uid}">
        <img src="{ava}"/>
        <div class="im_nameu fl_l">{name}</div>
        <span id="upNewMsg{uid}">{msg_num}</span>
        <div class="clear"></div>
    </div>
    <div class="im_del_dialog no_display cursor_pointer" onClick="im.box_del('{uid}'); return false"
         onMouseOver="$('#deia{uid}').show(); myhtml.title('{uid}', 'Удалить диалог', 'deia', -2)" id="deia{uid}"
         onMouseOut="$('#deia{uid}').hide()"></div>
    <div class="clear"></div>
</div>