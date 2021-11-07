<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;


class Buku3 extends BaseController
{
    public function index()
    {
        echo("aaa");
    }

     //Perintah Insert Data
    public function insertdata()
    {
        $buku = new bukuModel();
        $insert = $buku->insert([
        'judul_buku' => 'Belajar Codeigniter 3',
        'penerbit' => 'Andi Yogyakarta',
        'tahun_terbit' => '2020',
        'harga' => '51000',
        'penulis' => 'Dandi Sumarno'
        ]);
            if ($insert) {
            echo "Data Berhasil diinsert";
        } else {
            echo "<pre>";
            echo print_r($buku->errors());
            echo "</pre>";
        }
    }

    // Perintah Update Data
    public function updatedata($id)
    {
    $buku = new bukuModel();
    $update = $buku->update($id, [
    'judul_buku' => 'Belajar Codeigniter 4',
    'penerbit' => 'Andi Yogyakarta',
    'tahun_terbit' => '2021',
    'harga' => '60000',
    'penulis' => 'Dandi Sumarno'
    ]);
    if ($update) {
    echo "Data Berhasil diupdate";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Perintah Save untuk insert
    public function saveinsert()
    {
    $buku = new bukuModel();
    $data = [
    'judul_buku' => 'Belajar Laravel',
    'penerbit' => 'Andi Yogyakarta',
    'tahun_terbit' => '2019',
    'harga' => '70000',
    'penulis' => 'Dwi Primantoro'
    ];
    $simpan=$buku->save($data);

    if ($simpan) {
    echo "Data Berhasil disimpan";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Perintah Save untuk update
    public function saveupdate($id)
    {
    $buku = new bukuModel();
    $data = [
    'kd_buku' => $id,
    'judul_buku' => 'Belajar Laravel',
    'penerbit' => 'Andi Yogyakarta',
    'tahun_terbit' => '2020',
    'harga' => '75000',
    'penulis' => 'Dwi Primantoro'
    ];
    $simpan=$buku->save($data);
    if ($simpan) {
    echo "Data Berhasil diupdate";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Method Save untuk update tanpa array
    public function saveupdate2($id)
    {
    $buku = new bukuModel();
    $databuku = $buku->find($id);
    $databuku->harga = '80000';
    $simpan=$buku->save($databuku);
    if ($simpan) {
    echo "Data Berhasil diupdate";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Perintah Delete
    public function deletedata($id)
    {
    $buku = new bukuModel();
    $hapus=$buku->delete($id);
    if ($hapus) {
    echo "Data Berhasil dihapus";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Menghapus data dengan beberapa ID
    public function delete_few()
    {
    $buku = new bukuModel();
    $hapus=$buku->delete([13]);

    if ($hapus) {
    echo "Data Berhasil dihapus";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Menghapus data dengan perintah where
    public function delete_where()
    {
    $buku = new bukuModel();
    $hapus=$buku->where('judul_buku', 'Belajar Codeigniter 4')->delete();
    if ($hapus) {
    echo "Data Berhasil dihapus";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Menghapus Data secara permanen
    public function delete_true($id)
    {
    $buku = new bukuModel();
    $hapus=$buku->delete($id, true);
    if ($hapus) {
    echo "Data Berhasil dihapus";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Menghapus Permanent Seluruh data dari fitur SoftDeletes
    public function delete_purge()
    {
    $buku = new bukuModel();
    $hapus=$buku->purgeDeleted();
    if ($hapus) {
    echo "Data Berhasil dihapus Permanent";
    } else {
    echo "<pre>";
    echo print_r($buku->errors());
    echo "</pre>";
    }
    }

    //Menampilkan Data Menggunakan method find
    public function getdata_find($id)
    {
    $buku = new bukuModel();
    $databuku = $buku->find($id);
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method find Column
    public function getdata_fColoumn()
    {
    $buku = new bukuModel();
    $databuku = $buku->findColumn('judul_buku');

    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method findAll
    public function getdata_fAll()
    {
    $buku = new bukuModel();
    $databuku = $buku->findAll();
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method find findAll dengan tambahan where
    public function getdata_fAllW()
    {
    $buku = new bukuModel();
    $databuku = $buku->where("judul_buku","Belajar Codeigniter 3")->findAll();
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan Fitur First
    public function getdata_first()
    {
    $buku = new bukuModel();
    $databuku = $buku->where("judul_buku","Belajar Codeigniter 3")->first();
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method findAll dengan limit dan offset
    public function getdata_fAll_limit($limit, $offset)
    {
    $buku = new bukuModel();
    $databuku = $buku->findAll($limit, $offset);
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method findAll dengan withDeleted
    public function getdata_fAllWD()
    {
    $buku = new bukuModel();
    $databuku = $buku->withDeleted()->findAll();
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

    //Menampilkan Data Menggunakan method findAll dengan onlyDeleted
    public function getdata_fAllOD()
    {
    $buku = new bukuModel();
    $databuku = $buku->onlyDeleted()->findAll();
    echo "<pre>";
    echo print_r($databuku);
    echo "</pre>";
    }

}
