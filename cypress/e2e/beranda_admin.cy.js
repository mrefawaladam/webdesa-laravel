describe('Kelola Beranda', () => {
    it('Admin can open Kelola Beranda Admin', () => {
      cy.visit('http://localhost:8000/masuk')
  
      cy.get('input[name=email]').type('admin@gmail.com')
      cy.get('input[name=password]').type('password')
      cy.get('button').contains('Masuk').click()
      cy.url().should('contain', 'http://localhost:8000') 
    })
   
  })
   