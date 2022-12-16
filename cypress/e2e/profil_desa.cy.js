describe('Profil Desa', () => {
//   it('Admin can access Profil Desa', () => {
//     cy.visit('http://localhost:8000/masuk')

//     cy.get('input[name=email]').type('admin@gmail.com')
//     cy.get('input[name=password]').type('password')
//     cy.get('button').contains('Masuk').click()
//     cy.url().should('contain', 'http://localhost:8000/dashboard')

//     cy.get('a').contains('Profil Desa').click()
//     cy.url().should('contain', 'http://localhost:8000/profil-desa')
//   })

//   it('Admin can edit Profil Desa', () => {
//     cy.visit('http://localhost:8000/masuk')

//     cy.get('input[name=email]').type('admin@gmail.com')
//     cy.get('input[name=password]').type('password')
//     cy.get('button').contains('Masuk').click()
//     cy.url().should('contain', 'http://localhost:8000/dashboard')

//     cy.get('a').contains('Profil Desa').click()
//     cy.url().should('contain', 'http://localhost:8000/profil-desa')

//     cy.get('#nama_desa').clear()
//     cy.get('#nama_desa').type('Sukun')

//     cy.get('form > .btn').click()
//     cy.get('div').contains('Profil desa berhasil di perbarui')
//   })

//   it('Minimal 1 field filled', () => {
//     cy.visit('http://localhost:8000/masuk')

//     cy.get('input[name=email]').type('admin@gmail.com')
//     cy.get('input[name=password]').type('password')
//     cy.get('button').contains('Masuk').click()
//     cy.url().should('contain', 'http://localhost:8000/dashboard')

//     cy.get('a').contains('Profil Desa').click()
//     cy.url().should('contain', 'http://localhost:8000/profil-desa')

//     cy.get('form > .btn').click()
//     cy.get('div').contains('Tidak ada perubahan yang berhasil disimpan ')
//   })

  it('Admin can Ganti Foto', () => {
    cy.visit('http://localhost:8000/masuk')

    cy.get('input[name=email]').type('admin@gmail.com')
    cy.get('input[name=password]').type('password')
    cy.get('button').contains('Masuk').click()
    cy.url().should('contain', 'http://localhost:8000/dashboard')

    cy.get('a').contains('Profil Desa').click()
    cy.url().should('contain', 'http://localhost:8000/profil-desa')

    cy.get('a').contains('Ganti').click()
    cy.url().should('contain', 'http://localhost:8000/profil-desa#input-logo')
  })

})
