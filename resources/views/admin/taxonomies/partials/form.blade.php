<div class="form-group">
    <label>Название</label>
    <input type="text" name="name" value="{{$taxonomy->name ?? ''}}" class="form-control">
</div>
<div class="form-group">
    <label>URL</label>
    <input type="text" name="slug" value="{{$taxonomy->slug ?? ''}}" class="form-control">
    <small class="form-text">Оставьте пустым для автоматической генерации</small>
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>