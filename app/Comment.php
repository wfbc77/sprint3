<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	// The database table that this model users.
    protected $table = 'comments';

    // an array of the columns that are not mass assignable.
    protected $guarded = ['comment_id'];

    //Primary key is not the default id so set it.
    protected $primaryKey = 'comment_id';
}
