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
      <form action="/anime/{id}/new_review" method="POST">
        @csrf
        <div class="input-group">
          <label for="commentary"> Écrivez votre critique :</label>
          <input id="commentary" name="commentary" type="text" required />
          
          @error('commentary')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <button class="cta">Envoyer</button>

      </form>
    
  </div>


</x-layout>
