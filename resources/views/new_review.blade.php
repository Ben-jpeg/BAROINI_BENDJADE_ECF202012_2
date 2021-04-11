<x-layout>
  <x-slot name="title">
  {{ $anime->title }}
  </x-slot>

  <h1>Critiques sur {{ $anime->title }}</h1>

  <ul>
     @foreach($reviews as $review)
        <li class="ctaReviews">Note: <b>{{$review->rating}}/10</b> </br> {{ $review->comment }} </li>
        </br>
     @endforeach
  </ul>

  <div class="writeCommentary">
      <h2>Vous avez un avis ?</h2>

      <form action="" method="POST">
        @csrf
     <div class=rating-group >

        <select class='note' name="rating">
              <option name="rating" >0
              <option name="rating" >1
              <option name="rating" >2
              <option name="rating" >3
              <option name="rating" >4
              <option name="rating" >5
              <option name="rating" >6
              <option name="rating" >7
              <option name="rating" >8
              <option name="rating" >9
              <option name="rating" >10
        </select>

     </div>

      <div class="input-group">
          <label for="commentary"> Écrivez votre critique :</label>
          <textarea id="commentary" class="commentary cta" name="commentary" type="text" required></textarea>

          @error('commentary')
            <p class="error">{{ $message }}</p>
          @enderror
      </div>

        <button class="cta">Envoyer</button>

      </form>
    
  </div>


</x-layout>
