  <div class="row">
      <div class="col-md">
          <form action="/posts">
              @if(request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
              @endif
              @if(request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
              @endif
              <div class="input-group">
                  <input type="text" name="search" class="form-control form-control-sm" placeholder="search..." value="{{ request('search') }}">
                  <div class="input-group-append">
                      <button class="btn btn-sm btn-light" type="submit"><i class="bi bi-search"></i></button>
                  </div>
              </div>
          </form>
      </div>
  </div>
