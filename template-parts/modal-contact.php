<?php
/**
 * Template part / modal with contact form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>

<div id='contact-form-modal' class="modal fade modal--contact" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="modal-body">
        <form id='contact-form' class='container' action='' method='POST'>

          <div class="row">

            <div class="col">
              <label for="form-imie">Imię</label>
              <input id=' form-imie' name='imie' type="text" class="form-control">
            </div>

            <div class="col">
              <label for="form-nazwisko">Nazwisko</label>
              <input id='form-nazwisko' name='nazwisko' type="text" class="form-control">
            </div>

          </div>

          <div class="row">

            <div class="col">
              <label for="email">Email</label>
              <input id='email' name='email' type="email" class="form-control" t name">
            </div>

          </div>

          <div class="row">

            <div class="col">
              <label for="form-telefon">Telefon</label>
              <input id='form-telefon' name='imie' type="tel" class="form-control">
            </div>

          </div>

        </form>
      </div>

      <div class="modal-footer">
        <div class="container">

          <div class="row">

            <div class="col">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore
                et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor</p>
            </div>
          </div>

          <div class="row row--submit">

            <div class="col">
              <button form='contact-form' class="btn btn--solid" type='submit'>Wyślij</button>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</div>