

<form action="{{ route('products.search')}}" class="d-flex mb-0">
    <div class="form-group mb-0 col-12">
    
    <input class="form-control" type="text" name="q" placeholder="C'est qui l'papa ? " aria-label="Search" value="{{ request()->q ?? '' }}">
    </div>
    <button type="submit" class="btn btn-info mb-0"style="background-color:#1b838c"><i class="fas fa-search" ></i></button>
    </form>
    
    