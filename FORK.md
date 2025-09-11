# About this fork

## Overview

I like using opencart. And I have made quite a few sites on it. But I don't like a lot of repeating code, in controllers and in models. And also a small set of auxiliary functions. Of course, this speeds up performance, but I value the speed of creating new functionality and compact code more. This also allows you to reduce the number of errors, and if an error is still made, it will be only in one place, and not scattered throughout the project.
So here will be my basic fork with changes and additions made in different projects.

## I will do

- Publish in this bunch changes that I consider useful not only to me.
- Create pull requests to the developers of OpenCart if I consider it appropriate.
- Describe in this file the purpose of the changes and their use.

## I won't do 

- Rework the code of the entire OpenCart using my developments. Except for the case when this change will be accepted by the OpenCart developers.

## Сhanges

### Controller helper functions

#### commonControls

`commonControls(array &$data): void`

Replaces 6 lines of code used in the vast majority of controllers with a helper function

Instead:

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

You can just write:

		$this->commonControls($data);

## More will be added

- a set of helper functions for using controls;
- a set of helper functions for building queries;
- transactional data saving;
- centralized validation of mutually nested data.

### Future examples

An example of how you can create queries within a model:

		$this->sqlFilterId($sql, $data, 'filter_row_id', 'q2r.row_id');
  		$this->sqlFilterBool($sql, $data, 'filter_status', 'q.status');

		$sort_fields = [
  			'qd.name' => ['is_cast_as_uint' => true, 'is_lcase' => true],
	 		'q2g.name',
			'q.code' => ['is_lcase' => true],
			'q.sort_order'

		];
  		$default_sort = ['q2g.name', 'qd.name'];
		$sql .= $this->getSqlOrder($data, $sort_fields, default_sort);
		$sql .= $this->getSqlLimit($data);

		$query = $this->db->query($sql);
  

