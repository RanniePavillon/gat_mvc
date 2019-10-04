<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
interface TblScoreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblScore 
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
 	 * @param tblScore primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblScore tblScore
 	 */
	public function insert($tblScore);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblScore tblScore
 	 */
	public function update($tblScore);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByCTotal($value);

	public function queryByOTotal($value);

	public function queryByRTotal($value);

	public function queryByETotal($value);

	public function queryByOverallTotal($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUserId($value);

	public function deleteByCTotal($value);

	public function deleteByOTotal($value);

	public function deleteByRTotal($value);

	public function deleteByETotal($value);

	public function deleteByOverallTotal($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>