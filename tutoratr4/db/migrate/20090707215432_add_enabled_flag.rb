class AddEnabledFlag < ActiveRecord::Migration
  def self.up
    add_column :tutors, :enabled, :boolean, :default => 'f'
    add_column :courses, :enabled, :boolean, :default => 'f'
  end

  def self.down
    remove_column :tutors, :enabled
    remove_column :courses, :enabled
  end
end
