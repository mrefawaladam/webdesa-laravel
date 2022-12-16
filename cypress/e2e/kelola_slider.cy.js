describe('Kelola Slider', () => {
  it('Admin can open Kelola Slider', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Slider').click()
    cy.url().should('contain', 'http://localhost:8000/slider')
  })

  it('Admin can Batal Tambah Gambar', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Slider').click()
    cy.url().should('contain', 'http://localhost:8000/slider')

    cy.get('a').contains('Tambah Gambar').click()
    cy.get('.d-flex > .btn-white').click()
  })

  it('Admin can Tambah Gambar', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Slider').click()
    cy.url().should('contain', 'http://localhost:8000/slider')

    cy.get('a').contains('Tambah Gambar').click()
    cy.get('input[name=gambar]').selectFile('cypress/fixtures/linkaja.png')
    cy.get('textarea[name=caption]').type('Ini adalah caption')
    cy.get('.d-flex > .btn-primary').click()

    cy.get('div').contains('Gambar berhasil ditambahkan')
  })

  it('Gambar is required when Tambah Gambar', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Slider').click()
    cy.url().should('contain', 'http://localhost:8000/slider')

    cy.get('a').contains('Tambah Gambar').click()
    cy.get('textarea[name=caption]').type('Ini adalah caption')
    cy.get('.d-flex > .btn-primary').click()

    cy.get('div').contains('The gambar field is required.')
  })

  it('Admin can Hapus Gambar', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Kelola Slider').click()
    cy.url().should('contain', 'http://localhost:8000/slider')

    cy.get('.col-lg-4 > .mb-0').click()
    cy.get('#form-hapus > .btn').click()
    cy.get('div').contains('Gambar berhasil dihapus ')
  })
})
