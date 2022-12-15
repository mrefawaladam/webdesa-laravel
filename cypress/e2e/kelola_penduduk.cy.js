describe('Kelola Penduduk', () => {
    it('Admin can open Kelola Penduduk', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
      cy.get('a').contains('Kelola Penduduk').click()
      cy.url().should('contain', 'http://localhost:8000/penduduk')
    })
  
 
    it('Admin can Valid field required', () => {
        cy.visit('http://localhost:8000/masuk')
    
        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')
    
        cy.get('a').contains('Kelola Penduduk').click()
        cy.url().should('contain', 'http://localhost:8000/penduduk')

        cy.get('a').contains('Tambah Penduduk').click()
        cy.get('button[id=simpan]').click()
  
        cy.get('li').contains('The nik field is required.')
        cy.get('li').contains('The kk field is required.')
        cy.get('li').contains('The nama field is required.')
        cy.get('li').contains('The jenis kelamin field is required.')
        cy.get('li').contains('The tempat lahir field is required.')
        cy.get('li').contains('agama wajib diisi')
        cy.get('li').contains('status perkawinan wajib diisi')
        cy.get('li').contains('status hubungan dalam keluarga wajib diisi')
        cy.get('li').contains('The kewarganegaraan field is required.') 



      }) 

      it('Admin can Valid field nik and kk 16 digit', () => {
        cy.visit('http://localhost:8000/masuk')
    
        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')
    
        cy.get('a').contains('Kelola Penduduk').click()
        cy.url().should('contain', 'http://localhost:8000/penduduk')

        cy.get('a').contains('Tambah Penduduk').click()  
        cy.get('input[name=nik]').type('22')
        cy.get('input[name=kk]').type('22')
        cy.get('input[name=nama]').type('Berryl Radian') 
        cy.get('select#jenis_kelamin').select('1').should('have.value', '1')
        cy.get('input[name=tempat_lahir]').type('Papua')
        cy.get('input[name=tanggal_lahir]').type('2022-11-30')
        cy.get('select[name=darah_id]').select('1').should('have.value', '1')
        cy.get('select#agama_id').select('1').should('have.value', '1')
        cy.get('select#pendidikan_id').select('1').should('have.value', '1')
        cy.get('select#status_perkawinan_id').select('1').should('have.value', '1')
        cy.get('select#status_hubungan_dalam_keluarga_id').select('1').should('have.value', '1')
        cy.get('select#kewarganegaraan').select('1').should('have.value', '1')
        cy.get('input[name=nomor_paspor]').type('21441234') 
        cy.get('input[name=nomor_kitas_atau_kitap]').type('124124') 
        cy.get('input[name=nik_ayah]').type('421434') 
        cy.get('input[name=nama_ayah]').type('Turen') 
        cy.get('input[name=nik_ibu]').type('124234') 
        cy.get('input[name=nama_ibu]').type('Bustomi')   
        cy.get('textarea[name=alamat]').type('Papua nueweginia', {force:true})
        cy.get('select#dusun').select('1').should('have.value', '1')
        cy.get('select#detail_dusun_id').select('1').should('have.value', '1')
        cy.get('button[id=simpan]').click()
  
        cy.get('li').contains('The nik must be 16 digits.')
        cy.get('li').contains('The kk must be 16 digits.')
        cy.get('li').contains('The nik ayah must be 16 digits.')
        cy.get('li').contains('The nik ibu must be 16 digits.')
      }) 

    it('Admin can Tambah Penduduk', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
      cy.get('a').contains('Kelola Penduduk').click()
      cy.url().should('contain', 'http://localhost:8000/penduduk')
  
        cy.get('a').contains('Tambah Penduduk').click()
        cy.get('input[name=nik]').type('1234567890123456')
        cy.get('input[name=kk]').type('1234567890123456')
        cy.get('input[name=nama]').type('Berryl Radian') 
        cy.get('select#jenis_kelamin').select('1').should('have.value', '1')
        cy.get('input[name=tempat_lahir]').type('Papua')
        cy.get('input[name=tanggal_lahir]').type('2022-11-30')
        cy.get('select[name=darah_id]').select('1').should('have.value', '1')
        cy.get('select#agama_id').select('1').should('have.value', '1')
        cy.get('select#pendidikan_id').select('1').should('have.value', '1')
        cy.get('select#status_perkawinan_id').select('1').should('have.value', '1')
        cy.get('select#status_hubungan_dalam_keluarga_id').select('1').should('have.value', '1')
        cy.get('select#kewarganegaraan').select('1').should('have.value', '1')
        cy.get('input[name=nomor_paspor]').type('21441234') 
        cy.get('input[name=nomor_kitas_atau_kitap]').type('124124') 
        cy.get('input[name=nik_ayah]').type('1234567890123453') 
        cy.get('input[name=nama_ayah]').type('Turen') 
        cy.get('input[name=nik_ibu]').type('1234567890123450') 
        cy.get('input[name=nama_ibu]').type('Bustomi')   
        cy.get('textarea[name=alamat]').type('Papua nueweginia', {force:true})
        cy.get('select#dusun').select('1').should('have.value', '1')
        cy.get('select#detail_dusun_id').select('1').should('have.value', '1')
        cy.get('button[id=simpan]').click()

        cy.get('div').contains('Penduduk berhasil ditambahkan ')
    })
  
 
    it('Admin can Edit Penduduk', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
   
      cy.get('a').contains('Kelola Penduduk').click()
      cy.url().should('contain', 'http://localhost:8000/penduduk')
  
      cy.get('td > a.btn-success').click()
      cy.get('input[name=nama]').type('Berryl Radian') 
      cy.get('button[id=simpan]').click()

      cy.get('div').contains(' Penduduk berhasil diperbarui')
    })
  

  it('Admin can Hapus Pendudk', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Penduduk').click()
    cy.url().should('contain', 'http://localhost:8000/penduduk')


    cy.get('td > a.btn-danger').click()
    cy.get('#form-hapus > .btn').click()
    cy.get('div').contains('Penduduk berhasil diperbarui')
  })
  })
  