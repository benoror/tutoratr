class CreateInstitutions < ActiveRecord::Migration
  def self.up
    create_table :institutions do |t|
      t.string :name
      t.text :description
      t.integer :country_id

      t.timestamps
    end
  end

  def self.down
    drop_table :institutions
  end
end
