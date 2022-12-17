describe('Kelola Berita', () => {
  it('Admin can open Kelola Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')
  })

  it('Check Kembali button', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('a').contains('Kembali').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')
  })

  it('Admin can Tambah Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('input[name=gambar]').selectFile('cypress/fixtures/linkaja.png')
    cy.get('input[name=judul]').type('Pemerintah Sudah Bisa Melakukan Pembayaran Menggunakan Link Aja')
    cy.get('textarea[name=konten]').type(
        'Kini Pembayaran, Pinjaman, & Investasi Online dalam satu genggaman. Cukup scan QR / kode tiket untuk pembayaran offline di seluruh merchant.',
         {force:true}
    )
    cy.get('button[id=simpan]').click()

    cy.get('div').contains('Berita berhasil ditambahkan ')
  })

  it('Judul field is required when Tambah Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('input[name=gambar]').selectFile('cypress/fixtures/linkaja.png')
    cy.get('textarea[name=konten]').type(
        'Kini Pembayaran, Pinjaman, & Investasi Online dalam satu genggaman. Cukup scan QR / kode tiket untuk pembayaran offline di seluruh merchant.',
         {force:true}
    )
    cy.get('button[id=simpan]').click()

    cy.get('span').contains('The judul field is required')
  })

  it('Konten field is required when Tambah Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('input[name=gambar]').selectFile('cypress/fixtures/linkaja.png')
    cy.get('input[name=judul]').type('Pemerintah Sudah Bisa Melakukan Pembayaran Menggunakan Link Aja')
    cy.get('button[id=simpan]').click()

    cy.get('span').contains('The konten field is required')
  })

  it('Gambar field is required when Tambah Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('input[name=judul]').type('Pemerintah Sudah Bisa Melakukan Pembayaran Menggunakan Link Aja')
    cy.get('textarea[name=konten]').type(
        'Kini Pembayaran, Pinjaman, & Investasi Online dalam satu genggaman. Cukup scan QR / kode tiket untuk pembayaran offline di seluruh merchant.',
         {force:true}
    )
    cy.get('button[id=simpan]').click()

    cy.get('span').contains('The gambar field is required')
  })

  it('All field are required when Tambah Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get('a').contains('Tambah Berita').click()
    cy.get('button[id=simpan]').click()

    cy.get('span').contains('The judul field is required')
    cy.get('span').contains('The konten field is required')
    cy.get('span').contains('The gambar field is required')
  })

  it('Admin can Hapus Berita', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Berita').click()
    cy.url().should('contain', 'http://localhost:8000/kelola-berita')

    cy.get(':nth-child(1) > .card > .card-body > :nth-child(2) > .btn-danger').click()
    cy.get('#form-hapus > .btn').click()
    cy.get('div').contains('Berita berhasil dihapus')
  })

})
