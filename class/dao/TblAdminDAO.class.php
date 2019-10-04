<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
interface TblAdminDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblAdmin 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param tblAdmin primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAdmin tblAdmin
 	 */
	public function insert($tblAdmin);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAdmin tblAdmin
 	 */
	public function update($tblAdmin);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByType($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByType($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>