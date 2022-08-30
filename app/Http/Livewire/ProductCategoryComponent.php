<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryComponent extends Component
{
    use WithPagination;
    // Listeners
    protected $listeners = ['resetFields', 'destroy', 'newCategory'];

    //Component props
    public $name, $description, $id_category, $search_term = '', $created_at, $updated_at;

    // Paginate props
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;

    // Modal props
    public $modal_title, $modal_type;


    public function render()
    {
        $this->dispatchBrowserEvent('jquery');
        return view('livewire.product-category-component', [
            'categories' => $this->search_term != '' ? ProductCategory::orderBy('created_at', 'DES')->search($this->search_term)
                ->paginate($this->perPage)
                :  ProductCategory::orderBy('created_at', 'DESC')->paginate($this->perPage)
        ]);
    }

    public function show(ProductCategory $category) {
        $this->modal_type = 'show';
        $this->modal_title = 'Detalles de la categoría';
        $this->name = $category->name;
        $this->description = $category->description;
        $this->created_at = $category->created_at;
        $this->updated_at = $category->updated_at;
        $this->emit('triggerOpenModal');
    }

    public function newCategory()
    {
        $this->modal_type = 'create';
        $this->modal_title = 'Crear categoría';
        $this->emit('triggerOpenModal');
    }

    public function store()
    {
        $category = $this->validate([
            'name' => 'required|unique:product_categories|min:6',
            'description' => 'nullable|min:6|max:255'
        ]);

        try {
            ProductCategory::create($category);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'La categoría se agregó de forma correcta.',
                'position' => 'top-end',
                'icon' => 'success',
                'timer' => 1500,
                'showConfirmButton' => false,
                'toast' => true,
            ]);            
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Ocurrió un error al agregar la categoria.',
                'position' => 'top-end',
                'icon' => 'success',
                'timer' => 1500,
                'showConfirmButton' => false,
                'toast' => true,
            ]); 
        } finally{
            $this->emit('triggerCloseModal');
        }
    }

    public function edit(ProductCategory $category)
    {
        $this->modal_type = 'edit';
        $this->modal_title = 'Editar categoría';
        $this->id_category = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->emit('triggerOpenModal');
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'min:6', 'unique:product_categories,name,' . $this->id_category],
            'description' => 'nullable|min:6|max:255'
        ]);
        try {
            $category = ProductCategory::find($this->id_category);
            $category->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
            $category->touch();
            $category->updateTimestamps();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'La categoría se actualizó de forma correcta.',
                'position' => 'top-end',
                'icon' => 'success',
                'timer' => 1500,
                'showConfirmButton' => false,
                'toast' => true,
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Ocurrió un error al actualizar.',
                'position' => 'top-end',
                'icon' => 'error',
                'timer' => 1500,
                'showConfirmButton' => false,
                'toast' => true,
            ]);
        } finally {
            $this->emit('triggerCloseModal');
        }
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'La categoría se eliminó de forma correcta.',
            'position' => 'top-end',
            'icon' => 'success',
            'timer' => 1500,
            'showConfirmButton' => false,
            'toast' => true,
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->id_category = '';
    }
}
