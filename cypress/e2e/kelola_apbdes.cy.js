describe('Kelola APBDES', () => {
    it('Admin can open Kelola APBDES', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
      cy.get('a').contains('Kelola APBDes').click()
      cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')
    })
  
 
    it('Admin can Valid field required', () => {
        cy.visit('http://localhost:8000/masuk')
    
        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')
    
        cy.get('a').contains('Kelola APBDes').click()
        cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')

        cy.get('a').contains('Tambah APBDes').click()
        cy.get('button[id=simpan]').click()
  
        cy.get('li').contains('detail jenis anggaran wajib diisi')
        cy.get('li').contains('The nilai anggaran field is required.')
        cy.get('li').contains('The nilai realisasi field is required.') 

      }) 
 
    it('Admin can Tambah Pendapatan APBDES', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
     
      cy.get('a').contains('Kelola APBDes').click()
      cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')


      cy.get('a').contains('Tambah APBDes').click()
      
      cy.get('select#detail_jenis_anggaran_id').select('411').should('have.value', '411')
      cy.get('input[name=nilai_anggaran]').type('1000000')
      cy.get('input[name=nilai_realisasi]').type('30000')
      cy.get('textarea[name=keterangan_lainnya]').type('Dana Masuk pengembangan diniyah')  
      cy.get('button[id=simpan]').click() 
 
        cy.get('div').contains('Anggaran Realisasi APBDes berhasil ditambahkan')
    })
  
    it('Admin can Tambah Belanja APBDES', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
     
      cy.get('a').contains('Kelola APBDes').click()
      cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')



      cy.get('a').contains('BELANJA').click()
      cy.get('a').contains('Tambah APBDes').click()
 
        cy.get('select#detail_jenis_anggaran_id').select('521').should('have.value', '521')
        cy.get('input[name=nilai_anggaran]').type('1000000')
        cy.get('input[name=nilai_realisasi]').type('30000')
        cy.get('textarea[name=keterangan_lainnya]').type('Dana Masuk pengembangan diniyah')  
        cy.get('button[id=simpan]').click()

        cy.get('div').contains('Anggaran Realisasi APBDes berhasil ditambahkan')
    })

    it('Admin can Tambah PEMBIAYAAN APBDES', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000/dashboard')
  
     
      cy.get('a').contains('Kelola APBDes').click()
      cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')



      cy.get('a').contains('PEMBIAYAAN').click()
      cy.get('a').contains('Tambah APBDes').click()
 
        cy.get('select#detail_jenis_anggaran_id').select('613').should('have.value', '613')
        cy.get('input[name=nilai_anggaran]').type('1000000')
        cy.get('input[name=nilai_realisasi]').type('30000')
        cy.get('textarea[name=keterangan_lainnya]').type('Dana Penjualan kekayaan desa')  
        cy.get('button[id=simpan]').click()

        cy.get('div').contains('Anggaran Realisasi APBDes berhasil ditambahkan')
    })

  it('Admin can Hapus APBDes', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola APBDes').click()
    cy.url().should('contain', 'http://localhost:8000/anggaran-realisasi?jenis=pendapatan&tahun=2022')


    cy.get('td > a.btn-danger').click()
    cy.get('#form-hapus > .btn').click()
   })
  })
  