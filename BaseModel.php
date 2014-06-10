<?php
class BaseModel extends \Eloquent {
	protected $columns          = [];
	protected $rules            = [];
	protected $ignoredColumns   = ['id', 'created_at', 'updated_at'];
	protected $fillable         = [];

	public function __construct()
	{
		parent::__construct();

        $this->buildColumnNames();

        foreach ($this->columns as $column)
        {
            if (!in_array($column, $this->ignoredColumns))
            {
                $this->fillable[] = $column;
            }
        }
	}

    /**
     * This method allows you add database columns to ignore.
     *
     *  @param   $column string  The name of a column to ignore
     *  @return Pea
     */
    public function setIgnoredColumn($column)
    {
        $this->ignoredColumns[] = $column;

        return $this;
    }

    /**
     * Allows another object to get a list of the database tables columns
     *
     *  @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

	public function getTables()
	{
		$ret  = [];
		$results = DB::select(DB::raw('SHOW TABLES'));

		foreach ($results as $result)
		{
			foreach ($result as $table)
			{
				if ($table == 'migrations' || $table == NULL) { continue; }
					$ret[] = $table;
			}
		}
		return $ret;
	}

    /**
     * Allow another object to get the list of ignored database columns
     *
     *  @return array
     */
    public function getIgnoredColumns()
    {
        return $this->ignoredColumns;
    }

    /**
     * Allows another object to get the database validation rules.
     *
     *  @return array
     */
    public function getRules()
    {
            foreach ($this->columns as $column)
            {
                if (in_array($column, $this->ignoredColumns))
                {
                    continue;
                }

                $this->rules[$column] = 'required';
            }

            return $this->rules;
    }

	protected function buildColumnNames()
	{
		$query = 'SHOW COLUMNS FROM ' . strtolower('Pea' . 's');

		foreach(DB::select($query) as $column)
		{
			$this->columns[] = $column->Field;
		}
	}


	protected function modelTableHeader()
	{
	    $html = '';

		foreach ($this->columns as $column)
		{
	        if (!in_array($column, $this->ignoredColumns))
	        {
	            $html .= '<th>' . $column . '</th>';
	        }
		}

		return '<thead><tr>' . $html . '<th>actions</th></tr></thead>';
	}

    public function modelCreateForm()
    {
        $form = '<form method="POST" action="/' . strtolower('Pea') . 's">';

        foreach ($this->columns as $element)
        {
            if (!in_array($element, $this->ignoredColumns))
            {
                $form .= '<div class="form-group">
              <label class="col-md-2 control-label">' . $element . '</label>
              <div class="col-md-10">
                <input type="text" name="' . $element. '" class="form-control">
              </div>
            </div>';
            }
        }

        $form .= '<input type="submit" class="btn btn-primary" />';
        $form .= '</form>';

        return $form;
     }
}
