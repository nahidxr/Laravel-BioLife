<?Php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function myGet()
    {
        return $this->model->get();
    }
    public function myFind($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            flash('No Item Found')->error();
            return null;
        } else {
            return $data;
        }
    }
    public function myDelete($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            flash('No Item Found')->error();
        } else {
            flash('Successfully Deleted')->success();
            $data->delete();
        }
    }
}
