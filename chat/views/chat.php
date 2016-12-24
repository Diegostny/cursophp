<div class="chatarea"></div>

<div class="inputarea" data-nome="<?php echo $nome; ?>">
    <input id="msg" type="text" onkeyup="enviarMsgChat(this, event)" 
           placeholder="<?php echo $nome; ?>, digite sua mensagem"/>
</div>
<script type="text/javascript"> updateChat(); </script>
