<aside class="elementos_aux">
  <h2 id="tit_enlaces">Enlaces de Interes</h2>
  <ul id="enlaces">
    <li> <a href="#">Enlace</a> </li>
    <li> <a href="#">Enlace</a> </li>
    <li> <a href="#">Enlace</a> </li>
  </ul>
</aside>

<aside id="comentarios">
  <input type="button" onclick="ocultar()" value="VER" />
  <form id="formul">
    <div class="form-group">
      <label>Nombre</label>
      <input type="text" id="nombre-form" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" id="email-form" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label>Comentario</label>
      <textarea id="coment-form" onKeyUp="prohibidas()"></textarea>
      </div>
    <input value="Enviar" type="button" onclick="validar()"/>
  </form>
</aside>
