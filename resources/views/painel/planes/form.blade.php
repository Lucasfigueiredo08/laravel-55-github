          <!-- {!! csrf_field() !!}
 -->
        <div class="form-group">
            <!-- <input type="text" value="{{old('name')}}" name="name" placeholder="Nome:" class="form-control"> -->
            <label for="qtd_passengers" >Quantidade de Passageiros</label>
            {!! Form::number('qtd_passengers', null, ['class' => 'form-control', 'placeholder' => 'Quantidade']) !!}
        </div>

        <div class="form-group">
            <label for="class" >Classe</label>
            {!! Form::select('class', $classes, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="brand_id" >Marca</label>
            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
    <!-- </form> -->