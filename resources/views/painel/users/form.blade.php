          <!-- {!! csrf_field() !!}
 -->
        <div>
          <label for="name">Nome</label>
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
        </div>

        <div>
          <label for="name">Email</label>
          {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>

        <div>
          <label for="name">Senha (Nova Senha)</label>
          {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'senha']) !!}
        </div>

        <div> 
          {!! Form::checkbox('is_admin', true, null) !!}
          <label for="is_admin">É admin?</label>
        </div>

        
        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
    <!-- </form> -->