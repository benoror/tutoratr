class CreateTutors < ActiveRecord::Migration
  def self.up
    create_table :tutors do |t|
      t.string :name
      t.string :email
      t.string :pic
      t.integer :institution_id

      t.timestamps
    end
  end

  def self.down
    drop_table :tutors
  end
end
