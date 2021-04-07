<x-layout>
  <x-slot name="title">
  {{ $anime->title }}
  </x-slot>

  <h1>Critiques sur {{ $anime->title }}</h1>


<div class="commentaries" >
 <p>pseudo</p>
 <p>note</p>
 <p>commentaire</p>

</div>



  <div class="writeCommentary">
    
      <h2>Vous avez un avis ?</h2>
      <form action="/confirmationpost" method="POST">
        @csrf

     <div class=rating-group >

     <!-- <ul><li class="rating"><a href="#">Note</a>
       <ul>
          <li><a href="#">0</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">6</a></li>
          <li><a href="#">7</a></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><a href="#">10</a></li>
       </ul>
       </li></ul> -->

        <SELECT class='note' name="rating">
              <OPTION name="rating" >0
              <OPTION name="rating" >1
              <OPTION name="rating" >2
              <OPTION name="rating" >3
              <OPTION name="rating" >4
              <OPTION name="rating" >5
              <OPTION name="rating" >6
              <OPTION name="rating" >7
              <OPTION name="rating" >8
              <OPTION name="rating" >9
              <OPTION name="rating" >10
        </SELECT>

     </div>

      <div class="input-group">
          <label for="commentary"> Écrivez votre critique :</label>
          <textarea id="commentary" name="commentary" type="text" required></textarea>

          @error('commentary')
            <p class="error">{{ $message }}</p>
          @enderror
      </div>

        <button class="cta">Envoyer</button>

      </form>
    
  </div>


</x-layout>
