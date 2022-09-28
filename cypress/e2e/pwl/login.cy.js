/// <reference types="cypress" />
describe("User Can Open Login Page", () => {
    it("Login Page Can Be Open and Have Correct Spesification", () => {
        cy.visit("http://127.0.0.1:8000/login")
        cy.get('.h1').should("have.text", "Login VegeFruit")
        cy.get('.login-box-msg').should("have.text", "Sign in to start your session")
        cy.get('.btn').contains("Login").and("be.enabled")
    });

    it("User Can Login, Do CRUD, and Logout", () => {
        // User melakukan login
        cy.visit("http://127.0.0.1:8000/login")
        cy.get('.h1').should("have.text", "Login VegeFruit")
        cy.get('.login-box-msg').should("have.text", "Sign in to start your session")
        cy.get('.btn').contains("Login").and("be.enabled")

        cy.get(':nth-child(2) > .form-control').type("nisrina@gmail.com")
        cy.get(':nth-child(3) > .form-control').type("12345678")
        cy.get('.btn').click()

        cy.get('.row > :nth-child(1) > h5').contains("Halaman Home")

        // User membuat data produk baru (Create)
        cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link > .fas').click()
        cy.get('.nav > :nth-child(4) > .nav-link').click()
        cy.get('.float-right > .btn').click()
        cy.get('#kode_produk').type("PS008")
        cy.get('#nama_produk').type("Bayam")
        cy.get('#kategori_id').select("Sayur")
        cy.get('#harga_beli').type("20000")
        cy.get('#harga_jual').type("23000")
        cy.get('#stok').type("74")
        cy.get('#gambar').attachFile("bayam.jpg")
        cy.get('#myForm > .btn').click()

        // Show detail dari salah satu data produk (Read)
        cy.get(':nth-child(1) > :nth-child(9) > .d-inline > .btn-info').click()
        cy.get('.card > .btn').click()

        // Edit salah satu data produk (Update)
        cy.get(':nth-child(2) > :nth-child(9) > .d-inline > .btn-primary').click()
        cy.get('#harga_beli').type('{selectAll}')
        cy.get('#harga_beli').type('{backspace}')
        cy.get('#harga_beli').type("23000")

        cy.get('#stok').type('{backspace}')
        cy.get('#stok').type("5")
        cy.get('#gambar').attachFile("jeruk.jpg")
        cy.get('#myForm > .btn').click()

        // Hapus salah satu data produk (Delete)
        cy.get(':nth-child(4) > .page-link').click()
        cy.get(':nth-child(2) > :nth-child(9) > .d-inline > .btn-danger').click()
        
        // User dapat melakukan Logout
        cy.get('.dropdown > .nav-link').click()
        cy.get('.dropdown-item-title > form > .btn').click()
    });
});
